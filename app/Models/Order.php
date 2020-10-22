<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'district',
        'state',
        'country',
        'pincode',
        'email',
        'phone',
        'total',
        'payment_id',
        'shipped',
        'accepted'
    ];
}
