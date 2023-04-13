<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, Searchable;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courseReviews()
    {
        return $this->hasMany(CourseReview::class, 'course_id');
    }

    public function enrollCounts()
    {
        return $this->hasMany(CourseEnroll::class, 'course_id');
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'skill_level' => $this->skill_level,
        ];
    }
}
