<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
use HasFactory;

// Explicitly tell Laravel the exact name of your database table
protected $table = 'products';
}