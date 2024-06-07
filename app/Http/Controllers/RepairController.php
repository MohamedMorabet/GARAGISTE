<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;
use App\Models\Car;
use App\Models\Mechanical;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Charge;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\RepairCompleteMail;
use Illuminate\Support\Facades\Mail;

class RepairController extends Controller
{
    public function index()
    {
        return view('repair.repairs');
    }

    public function show()
    {
        return view('repair.show');
    }

    public function show2($id)
    {
        $repair = Repair::with(['car', 'invoice.charges'])->findOrFail($id);
        // dd($repair->invoice->charges);
        return view('repair.show', compact('repair'));
    }

    public function create($car_id)
    {
        $car = Car::findOrFail($car_id);
        $existingRepair = Repair::where('car_id', $car_id)
            ->where('status', '!=', 'completed')
            ->first();

        if ($existingRepair) {
            return redirect()->route('cars.index')->with('errorrepair', 'This car already has an ongoing repair');
        }
        return view('repair.create', compact('car'));
    }

    public function store(Request $request)
    {
        $request->session()->forget('success');
        $request->session()->forget('error');

        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:4',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $car_id = $request->input('car_id');

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('repairs', 'public');
                $images[] = $path;
            }
        }

        $repair = Repair::create([
            'car_id' => $car_id,
            'status' => 'pending',
            'description' => $validated['description'] ?? '',
            'images' => $images,
        ]);

        // Create an invoice for the repair
        Invoice::create([
            'repair_id' => $repair->id,
            'total_price' => 0,
        ]);

        return redirect()->route('cars.index')->with('successupdate', 'Repair and Invoice added successfully');
    }

    public function addCharge(Request $request, $repair_id)
    {
        $validated = $request->validate([
            'charge_name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $charge = Charge::create([
            'repair_id' => $repair_id,
            'charge_name' => $validated['charge_name'],
            'price' => $validated['price'],
        ]);

        // Update the total price of the invoice
        $invoice = Invoice::where('repair_id', $repair_id)->first();
        $invoice->total_price += $charge->price;
        $invoice->save();

        return redirect()->route('repairs.show', $repair_id)->with('successupdate', 'Charge added successfully');
    }


    public function list()
{
    $today = Carbon::today();
    // dd($today);

    // Fetch repairs that are either incomplete or completed today
    $repairs = Repair::with('car', 'mechanical')
        ->where('status', '!=', 'completed')
        ->orWhere(function ($query) use ($today) {
            $query->where('status', 'completed')
                  ->where('date_end', '=', $today)
                  ;
        })
        ->get();

    $mechanicals = Mechanical::all();
    return view('repair.list', compact('repairs', 'mechanicals'));
}
    // AdminController.php
public function historyadmn()
{
    $repairs = Repair::with('car', 'mechanical')
        ->where('status', 'completed')
        ->get();

    return view('repair.historyadmn', compact('repairs'));
}


    public function list2()
    {
        $currentMechanicalname = auth()->user()->name;
        $currentMechanical = Mechanical::where('name', $currentMechanicalname)->first();

        if ($currentMechanical) {
            // Filter out completed repairs
            $repairs = Repair::with('car')
                ->where('mechanical_id', $currentMechanical->id)
                ->where('status', '!=', 'completed')
                ->get();

            return view('repair.list2', compact('repairs'));
        } else {
            return redirect()->route('cars.index')->with('errorrepair', 'Current mechanical not found');
        }
    }

    public function history()
    {
        $currentMechanicalname = auth()->user()->name;
        $currentMechanical = Mechanical::where('name', $currentMechanicalname)->first();

        if ($currentMechanical) {
            // Get only completed repairs
            $repairs = Repair::with('car')
                ->where('mechanical_id', $currentMechanical->id)
                ->where('status', 'completed')
                ->get();

            return view('repair.history', compact('repairs'));
        } else {
            return redirect()->route('cars.index')->with('errorrepair', 'Current mechanical not found');
        }
    }

    public function listclient()
{
    $currentClientName = auth()->user()->name; // Example: Assuming the current user is authenticated and has a 'client' relationship
    $currentClient = Client::where('name', $currentClientName)->first();

    if ($currentClient) {
        $clientCars = Car::where('client_id', $currentClient->id)->pluck('id');

        $repairs = Repair::with('car')
                        ->whereIn('car_id', $clientCars)
                        ->where(function($query) {
                            $query->where('status', '!=', 'completed')
                                  ->orWhere('date_end', '>=', now());
                        })
                        ->get();

        return view('repair.listclient', compact('repairs'));
    } else {
        return redirect()->route('cars.index')->with('errorrepair', 'Current client not found');
    }
}

public function historyclient()
{
    $currentClientName = auth()->user()->name;
    $currentClient = Client::where('name', $currentClientName)->first();

    if ($currentClient) {
        $clientCars = Car::where('client_id', $currentClient->id)->pluck('id');

        $repairs = Repair::with('car')
                        ->whereIn('car_id', $clientCars)
                        ->where('status', 'completed')
                        ->where('date_end', '<', now())
                        ->get();

        return view('repair.historyclient', compact('repairs'));
    } else {
        return redirect()->route('cars.index')->with('errorrepair', 'Current client not found');
    }
}





    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'mechanical_id' => 'nullable|exists:mechanicals,id',
            'date_start' => 'nullable|date',
            'status' => 'required|string'
        ]);
        $status = $validated['status'];
        if ($status == "completed") {
            $validated['date_end'] = Carbon::now();
        } else {
            $validated['date_end'] = null;
        }

        $repair = Repair::findOrFail($id);
        if ($repair->status == "completed") {
            $validated['date_end'] = null;
        }
        $repair->update([
            'mechanical_id' => $validated['mechanical_id'],
            'date_start' => $validated['date_start'] ?? Carbon::now(),
            'status' => $validated['status'],
            'date_end' => $validated['date_end']
        ]);

        return redirect()->route('repairs.list')->with('successupdate', 'Repair updated successfully');
    }

    public function updateAdmin(Request $request, $id)
    {
        $validated = $request->validate([
            'mechanical_id' => 'nullable|exists:mechanicals,id',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
            'status' => 'required|string'
        ]);

        $repair = Repair::findOrFail($id);
        $status = $validated['status'];

        if ($repair->status == 'pending' && $status != 'pending') {
            $validated['date_start'] = Carbon::now();
        }

        if ($status == 'in_progress' && !$repair->date_start) {
            $validated['date_start'] = Carbon::now();
        }

        if ($status == 'completed' && $repair->status = 'completed') {
            $validated['date_end'] = Carbon::now();
        }

        $repair->update($validated);

        return redirect()->route('repairs.list')->with('successupdate', 'Repair updated successfully');
    }

    // Update function for mechanical
    public function updateMechanical(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string'
        ]);

        $repair = Repair::findOrFail($id);
        $status = $validated['status'];

        if ($repair->status == 'pending' && $status != 'pending') {
            $repair->date_start = Carbon::now();
        }

        if ($status == 'in_progress' && !$repair->date_start) {
            $repair->date_start = Carbon::now();
        }

        if ($status == 'completed') {
            $repair->date_end = Carbon::now();
        } else if ($repair->status == 'completed' && $status != 'completed') {
            $repair->date_end = null;
        }

        $repair->status = $status;
        $repair->save();

        $referringUrl = $request->input('referring_url', route('repairs.list2'));

        return redirect($referringUrl)->with('successupdate', 'Repair updated successfully');
    }

    public function torepair($id) {
        $repair = Repair::findOrFail($id);
        $repair->status = 'in_progress';
        $repair->date_end = null;
        $repair->save();
        return redirect()->route('repairs.list')->with('successupdate', 'Repair updated successfully');
    }

    public function generateInvoicePdf($id)
    {
        $repair = Repair::with('car.client', 'invoice.charges')->findOrFail($id);

        if (!$repair->invoice) {
            return redirect()->route('repairs.show', $id)->with('error', 'Invoice not found for this repair.');
        }

        $pdf = Pdf::loadView('pdf.invoice', ['invoice' => $repair->invoice]);
        return $pdf->download('invoice-' . $repair->invoice->id . ' ' . $repair->car->make . ' ' . $repair->car->model . '.pdf');
    }

    public function email($id) {
        $repair = Repair::with('car.client', 'invoice.charges')->findOrFail($id);
    
        if (!$repair->invoice) {
            return redirect()->route('repairs.show', $id)->with('error', 'Invoice not found for this repair.');
        }
    
        $data = [
            'repair' => $repair,
            'invoice' => $repair->invoice
        ];
    
        Mail::to($repair->car->client->email)->send(new RepairCompleteMail($data));
    
        return redirect()->route('repairs.historyadmn', $id)->with('success', 'Email sent successfully.');
    }

    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();
        return redirect()->route('repairs.list2')->with('successupdate', 'Repair deleted successfully');
    }
}
