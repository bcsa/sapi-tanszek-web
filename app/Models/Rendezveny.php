<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezveny extends Model
{
    use HasFactory;

    protected $table = 'rendezvenyek';

    protected $fillable = ['nev', 'helyszin', 'idopont', 'kepek', 'leiras', 'tipus'];

    protected $appends = [
        'ev',
        'honap',
        'nap',
    ];

    protected $casts = [
        'idopont' => 'date',
        'kepek' => 'array'
    ];

    public function getEvAttribute()
    {
        return $this->idopont->format('Y');
    }

    public function getHonapAttribute()
    {
        return $this->idopont->format('M');
    }

    public function getNapAttribute()
    {
        return $this->idopont->format('d');
    }
}
