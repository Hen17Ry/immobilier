<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    protected $fillable = [
        'main_image',
        'location',
        'price',
        'apartment_type',
        'description',
        'number_of_beds',
        'number_of_showers',
        'area',
        'your_photo',
        'first_image',
        'second_image',
        'third_image',
        'fourth_image'
    ];
}
