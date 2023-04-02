<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public $fillable = ['kwhPrice', 'napelemWatt', 'napelemSzel', 'napelemHossz', 'napelemNegyzetmeter'];
}
