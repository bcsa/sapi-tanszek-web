<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezveny extends Model
{
    use HasFactory;

    protected $table = 'rendezvenyek';

    protected $fillable = ['nev', 'idopont', 'helyszin', 'resztvevok', 'tipus', 'kepek', 'leiras', 'tipus'];

    protected $appends = [
        'ev',
        'honap',
        'nap',
    ];

    protected $casts = [
        'idopont' => 'date',
        'kepek' => 'array'
    ];

    public function getIdopontAttribute($date): string
    {
        return Carbon::parse($date)->toDateString();
    }

    public function getEvAttribute(): string
    {
        return Carbon::parse($this->attributes['idopont'])->format('Y');
    }

    public function getHonapAttribute(): string
    {
        return Carbon::parse($this->attributes['idopont'])->getTranslatedShortMonthName();
    }

    public function getNapAttribute(): string
    {
        return Carbon::parse($this->attributes['idopont'])->format('d');
    }
}
