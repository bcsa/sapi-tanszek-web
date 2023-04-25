<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanar extends Model
{
    use HasFactory;

    protected $table = 'tanarok';

    protected $fillable = ['nev', 'email', 'pozicio', 'bio', 'avatar'];
}
