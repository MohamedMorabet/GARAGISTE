<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;

    protected $fillable = ['repair_id', 'invoice_id', 'charge_name', 'price'];

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
