<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Program
 *
 * @property int $id
 * @property int $lesson_id
 * @property string|null $name
 * @property string|null $source_code
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Lesson $lesson
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ProgramFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Program newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Program query()
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereSourceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Program withoutTrashed()
 * @mixin \Eloquent
 */
class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'source_code',
        'type'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'program_user', 'program_id', 'user_id')->withTimestamps();
    }

    public function userJoinedProgram($programId)
    {
        if (ProgramUser::where('program_id', $programId)->where('user_id', auth()->id())->count()) {
            return true;
        }
        return false;
    }
}
