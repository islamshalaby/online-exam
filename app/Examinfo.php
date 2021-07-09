<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examinfo extends Model
{
    //
    protected $fillable = [
        'Teacher_id', 'Course', 'question_lenth','uniqueid','time', 'level', 'score',
        'exam_id', // self join
        'type'  // 1 => live exam
                // 2 => test exam
    ];

    public function parent() {
        return $this->belongsTo('App\examinfo', 'exam_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'exam_id', 'id');
    }

    public function student() {
        return $this->hasOne('App\Student', 'uniqueid', 'uniqueid');
    }

    public function students() {
        return $this->hasMany('App\Student', 'uniqueid', 'uniqueid');
    }

    public function questions() {
        return $this->hasMany('App\Question', 'quiz_id');
    }
}
