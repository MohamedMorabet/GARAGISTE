<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'adress',
        'phone',
        'email',
        'password',
        'role',
        'remember_token', // Ensure remember_token is in fillable properties
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($profile) {
            if ($profile->role === 'client') {
                $profile->client()->delete();
            } elseif ($profile->role === 'mechanical') {
                $profile->mechanical()->delete();
            }
        });
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'email', 'email');
    }

    public function mechanical()
    {
        return $this->hasOne(Mechanical::class, 'email', 'email');
    }
}
