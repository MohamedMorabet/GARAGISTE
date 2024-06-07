<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['make', 'model', 'fuel_type', 'registration', 'photos', 'client_id'];
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}