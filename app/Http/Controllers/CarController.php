<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $Cars = Car::all();
        // dd($Cars);
        return view('car.cars', compact('Cars'));
    }

    public function indexclient()
    {
            $currentClientName = auth()->user()->name; // Assuming the client is authenticated
            $currentClient = Client::where('name', $currentClientName)->first();
    
            if ($currentClient) {
                $Cars = Car::where('client_id', $currentClient->id)->get();
                return view('car.cars', compact('Cars'));
            } else {
                return redirect()->route('cars.index')->with('error', 'Client not found.');
            }
    }

    public function create()
    {
        if (auth()->user()->role == 'client') {
            $currentClient = Client::where('name', auth()->user()->name)->first();
            // dd($currentClient->name);
            return view('car.create', compact('currentClient'));
        }
        else {
            $Clients = Client::all();
            return view('car.create', compact('Clients'));
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            'photos' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'client_id' => 'required|exists:clients,id',
        ]);

        if ($request->hasFile('photos')) {
            $imagePath = $request->file('photos')->store('car_images', 'public');
            $validated['photos'] = $imagePath;
        }
 
        Car::create($validated);

        if (auth()->user()->role == 'client') {
            return redirect()->route('cars.indexclient')->with('success', 'Car added successfully.');
        }

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function show(Car $Car)
    {
        return view('car.show', compact('Car'));
    }

    public function edit(Car $Car)
    {
        return view('cars.edit', compact('Car'));
    }

    public function update(Request $request, Car $Car)
    {
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            'photos' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'client_id' => 'required|exists:clients,id',
        ]);


        if ($request->hasFile('photos')) {
            // Delete the old image if exists
            if ($Car->photos) {
                Storage::disk('public')->delete($Car->photos);
            }
            $imagePath = $request->file('photos')->store('car_images', 'public');
            $validated['photos'] = $imagePath;
        }


        $Car->update($validated);

        return redirect()->route('car.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $Car)
    {
        if ($Car->photos) {
            Storage::disk('public')->delete($Car->photos);
        }
        $Car->delete();
        return redirect()->route('cars.index')->with('success_delete', 'Car deleted successfully.');
    }
}
