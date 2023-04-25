<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezveny extends Model
{
    use HasFactory;

    protected $table = 'rendezvenyek';

    protected $fillable = ['nev', 'helyszin', 'idopont', 'kepek', 'leiras', 'tipus'];
}
