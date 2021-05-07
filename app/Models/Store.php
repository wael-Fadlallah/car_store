<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'location',
        'password',
        'phone',
        'status',
    ];

    public function getStatusAttribute($value){
        if( $value == 1 ){
            return __('lan.open') ;
        }else{
            return __('lan.close') ;
        }
    }
}
