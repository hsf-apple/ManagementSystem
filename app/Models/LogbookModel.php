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

}
