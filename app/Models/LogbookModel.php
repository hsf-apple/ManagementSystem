<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogbookModel extends Model
{
    use HasFactory;

    protected $table = 'logbook';

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

    public function fkStudent()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }

    public function fkLecture()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

     //index
     public function listlogbook()
     {

             $getsession = session()->get('userprimarykey');

             $user = new studentprofileModel();

             $user = $user::where('user_id',$getsession)->firstOrFail();

             $titlelist = LogbookModel::Select()->where('studentId',$user->fkStudent)->get();

             return $titlelist;
     }

     public function checksv()
     {

             $getsession = session()->get('userprimarykey');

             $user = new studentprofileModel();

             $user = $user::where('user_id',$getsession)->firstOrFail();

             $checksv = ApprovalModel::Select()->where('studentId',$user->fkStudent)->with()->get();

             return $checksv;
     }

}
