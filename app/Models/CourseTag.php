<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseTag
 *
 * @property int $course_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CourseTagFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTag whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseTag extends Model
{
    use HasFactory;

    protected $table = 'course_tag';

    protected $fillable = [
        'course_id',
        'tag_id'
    ];
}
