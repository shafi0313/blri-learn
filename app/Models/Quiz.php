<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function options(){
        return $this->hasMany(QuizOption::class, 'quiz_id');
    }
    public function correctOptions(){
        return $this->hasMany(QuizOption::class, 'quiz_id')->where('correct', 1);
    }
}
