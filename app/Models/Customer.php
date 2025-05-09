<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_full',
        'cpf',
        'email',
        'phone',
        'zip_code',
        'address',
        'street',
        'neighborhood',
        'number',
        'city',
        'state'
    ];
}