<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProgramUser
 *
 * @property int $program_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $lesson_id
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramUser whereUserId($value)
 * @mixin \Eloquent
 */
class ProgramUser extends Model
{
    use HasFactory;

    protected $table = 'program_user';

    protected $fillable = [
        'program_id',
        'user_id',
        'lesson_id'
    ];

}
