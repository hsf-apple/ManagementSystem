<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogbookModel extends Model
{
    use HasFactory;

    protected $table = 'studentprofile';

    protected $fillable= [
        'meetingDate',
        'startTime',
        'endTime',
        'currentProgress',
        'discDetail',
        'actPlan'
    ];

    protected $guarded = ['studentId', 'lectureId'];
    public $timestamps = false;


    public function fkLecture()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

    public function fkStudent()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }
}
