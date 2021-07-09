<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'student_id', 'uniqueid', 'score',
        'test_score',
        'status'    // 0 => not passed
                    // 1 => passed
    ];

    public function answers() {
        return $this->hasMany('App\Answer', 'stu_id');
    }

    public function exam() {
        return $this->belongsTo('App\Examinfo', 'uniqueid', 'uniqueid');
    }

    public function user() {
        return $this->belongsTo('App\User', 'student_id', 'id');
    }
}
