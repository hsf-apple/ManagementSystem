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

        $titlelist = LogbookModel::Select()->where('studentId',$user->user_id)->with('fkLecture')->get();

        return $titlelist;
     }

     public function checksv()
     {

        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $checksv1 = ApprovalModel::Select()->where('studentId',$user->user_id)->with('fkLecture')->get();

        return $checksv1;
     }

           //store
    public function store($data)
    {

        $getsession = $data->session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $addlogbookdata = $data->all();

        $checksvforFKinsert = new studentprofileModel();

        $checksvforFKinsert = ApprovalModel::where('studentId',$user->user_id)->first();

        $saveinfunctionstudent = new LogbookModel($addlogbookdata);
      
        $saveinfunctionstudent->lectureId = $checksvforFKinsert->fkLecture->lectureId;

        $user->logbook()->save($saveinfunctionstudent);
    }

    public function showspecificlogbook($data)
     {
         $updatetitle = LogbookModel::findOrFail($data);

         return $updatetitle;
     }

}
