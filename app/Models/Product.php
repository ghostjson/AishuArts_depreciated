<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'active'
    ];

    public function getPriceAttribute($value){
        $formatted = "₹".$value;
        return $formatted;
    }
}
