<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'position',
        'address',
        'workData',
        'street',
        'suite',
        'city',
        'zipcode',
        'lat',
        'lng'
    ];
}
