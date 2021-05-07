<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'id',
        'name',
        'brand',
        'price',
        'model',
        'color',
        'type',
        'age',
        'kilometer',
        'status',
        'description',
        'store_id',
        'category_id',
        'image',
    ];


}
