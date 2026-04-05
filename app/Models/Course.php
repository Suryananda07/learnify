<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'tips',
        'url_video',
        'duration_video',
        'duration_lesson',
        'category_id',
        'user_id',
    ];

    public function topics(){
        return $this->hasMany(Topic::class, 'course_id');
    }

    public function quizQuestions(){
        return $this->hasMany(QuizQuestion::class, 'course_id');
    }

    public function quizResults(){
        return $this->hasMany(QuizResult::class, 'course_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    use HasFactory;
}
