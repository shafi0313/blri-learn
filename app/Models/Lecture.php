<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function chapters()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id','id');
    }
    public function enroll()
    {
        return $this->hasOne(CourseEnroll::class, 'lecture_id','id');
    }
    public function lectureText()
    {
        return $this->hasOne(LectureText::class, 'lecture_id','id');
    }
}
