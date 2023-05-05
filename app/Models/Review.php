<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property string|null $message
 * @property int|null $rate
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ReviewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Review mainReviews()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Review withoutTrashed()
 * @mixin \Eloquent
 */
class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'user_id',
        'message',
        'rate',
        'parent_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeMainReviews($query)
    {
        return $query->take(config('variable.num_reviews_home'));
    }

    public function checkUserReview()
    {
        return $this['user_id'] == auth()->id();
    }
}
