<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CustomerTemperature;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_full',
        'cpf',
        'email',
        'phone',
        'zip_code',
        'street',
        'neighborhood',
        'number',
        'city',
        'state',
        'customer_temperature_id',
    ];

    public function customer_temperature()
    {
        return $this->belongsTo(CustomerTemperature::class);
    }
}