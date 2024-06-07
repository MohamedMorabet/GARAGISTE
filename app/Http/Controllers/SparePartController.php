<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Exports\SparePartsExport;
use App\Imports\SparePartsImport;
use Maatwebsite\Excel\Facades\Excel;

class SparePartController extends Controller
{
    public function index()
    {
        $spareParts = SparePart::all();
        return view('spareParts.index', compact('spareParts'));
    }

    public function create()
    {
        return view('spareParts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'reference' => 'required|unique:spare_parts',
            'supplier' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        SparePart::create($request->all());
        return redirect()->route('spareParts.index')->with('success', __('spare_part_added'));
    }

    public function edit(SparePart $sparePart)
    {
        return view('spareParts.edit', compact('sparePart'));
    }

    public function update(Request $request, SparePart $sparePart)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'reference' => 'required',
            'supplier' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $sparePart->update($request->all());
        return redirect()->route('spareParts.index')->with('success', __('spare_part_updated'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $spareParts = SparePart::where('name', 'LIKE', "%{$query}%")
            ->orWhere('reference', 'LIKE', "%{$query}%")
            ->orWhere('supplier', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($spareParts);
    }

    public function destroy(SparePart $sparePart)
    {
        $sparePart->delete();
        return redirect()->route('spareParts.index')->with('success', __('spare_part_deleted'));
    }

    public function export() 
    {
        return Excel::download(new SparePartsExport, 'spare_parts.xlsx');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        Excel::import(new SparePartsImport, $request->file('file'));

        return redirect()->route('spareParts.index')->with('success', __('spare_parts_imported'));
    }
}
