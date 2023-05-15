<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rendezveny
 *
 * @property int $id
 * @property string $nev
 * @property string|null $helyszin
 * @property string|null $resztvevok
 * @property string $idopont
 * @property array|null $kepek
 * @property string|null $leiras
 * @property string|null $tipus
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $ev
 * @property-read string $honap
 * @property-read string $nap
 * @method static \Database\Factories\RendezvenyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereHelyszin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereIdopont($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereKepek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereLeiras($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereNev($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereResztvevok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereTipus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendezveny whereUpdatedAt($value)
 */
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
