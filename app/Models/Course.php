<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $description
 * @property int|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $avg_star
 * @property-read mixed $course_price
 * @property-read mixed $course_status
 * @property-read mixed $five_stars
 * @property-read mixed $four_stars
 * @property-read mixed $one_stars
 * @property-read mixed $review_rating
 * @property-read mixed $three_stars
 * @property-read mixed $total_learners
 * @property-read mixed $total_lessons
 * @property-read mixed $total_times
 * @property-read mixed $two_stars
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $teachers
 * @property-read int|null $teachers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\CourseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Course mainCourses()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course otherCourses()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course search($data)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course withoutTrashed()
 * @mixin \Eloquent
 */
class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag', 'course_id', 'tag_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id')->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_teacher', 'course_id', 'user_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }

    public function scopeMainCourses($query)
    {
        return $query->take(config('variable.num_courses_home'));
    }

    public function scopeOtherCourses($query)
    {
        return $query->skip(config('variable.skip_courses_home'))->take(config('variable.num_courses_home'));
    }

    public function getTotalLearnersAttribute()
    {
        return $this->users()->count();
    }

    public function getTotalLessonsAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTotalTimesAttribute()
    {
        return $this->lessons()->sum(config('variable.sum'));
    }

    public function getFiveStarsAttribute()
    {
        return $this->reviews()->where('rate', 5)->count();
    }

    public function getFourStarsAttribute()
    {
        return $this->reviews()->where('rate', 4)->count();
    }

    public function getThreeStarsAttribute()
    {
        return $this->reviews()->where('rate', 3)->count();
    }

    public function getTwoStarsAttribute()
    {
        return $this->reviews()->where('rate', 2)->count();
    }

    public function getOneStarsAttribute()
    {
        return $this->reviews()->where('rate', 1)->count();
    }

    public function getAvgStarAttribute()
    {
        return round($this->reviews->where('parent_id', 0)->avg('rate'), 1);
    }

    public function getReviewRatingAttribute()
    {
        return $this->reviews()->where('parent_id', 0)->count();
    }

    public function getCoursePriceAttribute()
    {
        if ($this->price > 0) {
            return $this->price;
        }
        return __('course-detail.free');
    }

    public function getCourseStatusAttribute()
    {
        if (!$this->isJoined()->count()) {
            return __('course-detail.not_join');
        }
        if ($this->isFinished()->count()) {
            return __('course-detail.completed');
        }
        return __('course-detail.learning');
    }

    public function isJoined()
    {
        return $this->users()->whereExists(function ($query) {
            $query->where('users.id', auth()->id());
        });
    }

    public function userReviewed()
    {
        return $this->reviews()->where('parent_id', 0)->where('deleted_at', null)->whereExists(function ($query) {
            $query->where('user_id', auth()->id());
        });
    }

    public function isFinished()
    {
        return $this->users()->whereExists(function ($query) {
            $query->where('users.id', auth()->id());
        })->whereNotNull('course_user.deleted_at');
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('name', 'LIKE', "%" . $data['keyword'] . "%")->orWhere('description', 'LIKE', "%" . $data['keyword'] . "%");
        }

        if (isset($data['created_time']) && $data['created_time'] == config('variable.sort_by_newest')) {
            $query->orderBy('created_at', config('variable.orderby_direction'));
        }

        if (isset($data['teachers'])) {
            $query->whereHas('teachers', function ($query) use ($data) {
                $query->whereIn('user_id', $data['teachers']);
            });
        }

        if (isset($data['learner'])) {
            $query->withCount('users')->orderBy('users_count', $data['learner']);
        }

        if (isset($data['time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $data['time']);
        }

        if (isset($data['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $data['lesson']);
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($query) use ($data) {
                $query->whereIn('tag_id', $data['tags']);
            });
        }

        if (isset($data['review'])) {
            $query->withCount('reviews')->orderBy('reviews_count', $data['review']);
        }

        return $query;
    }
}
