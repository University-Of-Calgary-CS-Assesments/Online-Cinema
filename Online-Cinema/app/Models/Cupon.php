<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'uniqueId',
        'expiryDate',
         'amount',
        'customer_id'
    ];

    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function isExpired()
    {
        return $this->expiryDate && Carbon::parse($this->expiryDate)->isPast();
    }

    public function isUsed()
    {
        return $this->used;
    }

    public function markAsUsed()
    {
        $this->used = true;
        $this->save();
    }
}
