<?php

namespace App\Exports;

use App\Models\SparePart;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SparePartsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return SparePart::select('name', 'reference', 'supplier', 'price', 'quantity')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Reference',
            'Supplier',
            'Price',
            'Quantity',
        ];
    }
}
