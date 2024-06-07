<?php

// app/Models/SparePart.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'reference', 'supplier', 'price', 'quantity',
    ];
}
