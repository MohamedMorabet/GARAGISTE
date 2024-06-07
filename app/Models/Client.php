<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'adress',
        'phone',
        'email',
        'password'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'email', 'email');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'client_id', 'id');
    }
}
