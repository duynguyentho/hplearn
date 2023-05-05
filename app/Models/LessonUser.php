<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LessonUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LessonUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonUser query()
 * @mixin \Eloquent
 */
class LessonUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'user_id'
    ];
}
