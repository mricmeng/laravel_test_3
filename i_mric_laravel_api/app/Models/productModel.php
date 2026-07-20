<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productModel extends Model
{
    use HasFactory;
    protected $table = 'product_models';
    protected $fillable = [
        'id',
        'name',
        'price',
        'qty',
        'image',
        'created_at',
        'updated_at',   
    ];
}