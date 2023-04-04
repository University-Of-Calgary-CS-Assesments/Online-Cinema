<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function isExpired()
    {
        return $this->expiryDate && $this->expiryDate->isPast();
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
