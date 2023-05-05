<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property int $course_id
 * @property string|null $name
 * @property string|null $image
 * @property string $description
 * @property string $requirements
 * @property int $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Course $course
 * @property-read mixed $total_programs
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Program> $programs
 * @property-read int|null $programs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\LessonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson search($data)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson withoutTrashed()
 * @mixin \Eloquent
 */
class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'description',
        'requirements',
        'time',
        'name',
        'image',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'lesson_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_user', 'lession_id', 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['keyword'])) {
            return $query->where('name', 'LIKE', '%' . $data['keyword'] . '%');
        }
        return $query;
    }

    public function getTotalProgramsAttribute()
    {
        return $this->programs()->count();
    }
}
