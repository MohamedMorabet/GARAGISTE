<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use App\Models\Repair;
use App\Models\Invoice;
use App\Models\SparePart;

class ChargeController extends Controller
{
    public function create($repairId)
    {
        $repair = Repair::findOrFail($repairId);
        return view('charges.create', compact('repair'));
    }

    public function store(Request $request, $repairId)
    {
        $validated = $request->validate([
            'charge_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $repair = Repair::findOrFail($repairId);
        $invoice = Invoice::where('repair_id', $repair->id)->firstOrFail();

        $charge = Charge::create([
            'repair_id' => $repair->id,
            'invoice_id' => $invoice->id,
            'charge_name' => $validated['charge_name'],
            'price' => $validated['price'],
        ]);

        // Update the total price of the invoice
        $invoice->total_price += $charge->price;
        $invoice->save();

        return redirect()->route('repairs.show2', $repair->id)->with('successupdate', 'Charge added successfully');
    }

    public function selectSparePart($repairId)
    {
        $repair = Repair::findOrFail($repairId);
        $spareParts = SparePart::all();
        return view('charges.select', compact('repair', 'spareParts'));
    }

    public function storeSparePart(Request $request, $repairId)
    {
        $validated = $request->validate([
            'spare_part_id' => 'required|exists:spare_parts,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $sparePart = SparePart::findOrFail($validated['spare_part_id']);

        // Check if the spare part has enough quantity
        if ($sparePart->quantity < $validated['quantity']) {
            return redirect()->back()->with(['error' => 'Not enough stock available for this spare part.']);
        }

        $repair = Repair::findOrFail($repairId);
        $invoice = Invoice::where('repair_id', $repair->id)->firstOrFail();

        $totalPrice = $sparePart->price * $validated['quantity'];

        $charge = Charge::create([
            'repair_id' => $repair->id,
            'invoice_id' => $invoice->id,
            'charge_name' => "{$validated['quantity']} of {$sparePart->name}",
            'price' => $totalPrice,
        ]);

        // Deduct the quantity from the spare parts stock
        $sparePart->quantity -= $validated['quantity'];
        $sparePart->save();
        // dd($sparePart->quantity);
        // Update the total price of the invoice
        $invoice->total_price += $charge->price;
        $invoice->save();



        return redirect()->route('repairs.show2', $repair->id)->with('successupdate', 'Spare part added as charge successfully');
    }
}
