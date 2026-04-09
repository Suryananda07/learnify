<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{

    use HasFactory;
    protected $fillable = [
        'score',
        'answers',
        'user_id',
        'course_id'
    ];

    protected $casts = [
        'answers' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
