<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseTeacher
 *
 * @property int $user_id
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CourseTeacherFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTeacher whereUserId($value)
 * @mixin \Eloquent
 */
class CourseTeacher extends Model
{
    use HasFactory;

    protected $table = 'course_teacher';

    protected $fillable = [
        'user_id',
        'course_id'
    ];
}
