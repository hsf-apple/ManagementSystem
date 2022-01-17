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

    protected $guarded = ['studentId', 'lectureId','logbookStatus'];
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


     //display sv data in index
     public function listlogbooktest()
     {

        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $checksvforFKinsert = ApprovalModel::where('studentId',$user->user_id)->with('fkLecture')->first();

        return $checksvforFKinsert;
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

     public function editlogbook($data)
     {
        $updatelogbook = LogbookModel::findOrFail($data);

        return $updatelogbook;
     }

     public function PUTmethod($data, $dataid)
     {
         $postupdate = LogbookModel::whereid($dataid)->first();
         $postupdate->update($data->all());
     }



      //index lecture dasboard
      public function logbookstudent()
      {
        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $titlelist = LogbookModel::Select()->where('lectureID',$user->user_id)->with('fkStudent')->get();

        return $titlelist;
      }
}
