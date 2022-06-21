<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courseReviews(){
        return $this->hasMany(CourseReview::class,'course_id');
    }

    public function enrollCounts(){
        return $this->hasMany(CourseEnroll::class,'course_id');
    }


}
