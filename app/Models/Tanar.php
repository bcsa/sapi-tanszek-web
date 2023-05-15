<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tanar
 *
 * @property int $id
 * @property string $nev
 * @property string $email
 * @property string|null $pozicio
 * @property string|null $bio
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar whereNev($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar wherePozicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tanar whereUpdatedAt($value)
 */
class Tanar extends Model
{
    use HasFactory;

    protected $table = 'tanarok';

    protected $fillable = ['nev', 'email', 'pozicio', 'bio', 'avatar'];
}
