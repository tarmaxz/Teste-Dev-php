<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class CustomerTemperature extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}