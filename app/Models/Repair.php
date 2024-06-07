<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'mechanical_id',
        'status',
        'date_start',
        'date_end',
        'description',  // Add description
        'images',       // Add images
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function mechanical()
    {
        return $this->belongsTo(Mechanical::class);
    }

    protected $casts = [
        'images' => 'array',  // Ensure images field is cast to an array
    ];

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
    
}
