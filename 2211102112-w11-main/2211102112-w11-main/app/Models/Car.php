<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Tambahkan ini:
    protected $fillable = [
    'merk', 
    'model', 
    'color', 
    'year', 
    'price', 
    'image'
];
}
