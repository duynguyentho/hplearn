<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CourseUser
 *
 * @property int $course_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\CourseUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser learners()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser withoutTrashed()
 * @mixin \Eloquent
 */
class CourseUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'course_user';

    protected $fillable = [
        'course_id',
        'user_id'
    ];

    public function scopeLearners($query)
    {
        return $query->select('user_id')->groupBy('user_id');
    }
}
