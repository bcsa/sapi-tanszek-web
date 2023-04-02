<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public $fillable = ['offerPrice', 'roofType', 'roofMaterial', 'roofOrientation', 'roofGrade',
        'firstName', 'lastName', 'email', 'phone', 'city', 'street', 'streetNumber', 'postcode'];
}
