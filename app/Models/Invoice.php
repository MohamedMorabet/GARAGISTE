<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['repair_id', 'total_price'];

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
