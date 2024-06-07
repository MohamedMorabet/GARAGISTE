<?php

namespace App\Imports;

use App\Models\SparePart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SparePartsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new SparePart([
            'name' => $row['name'],
            'reference' => $row['reference'],
            'supplier' => $row['supplier'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
        ]);
    }
}
