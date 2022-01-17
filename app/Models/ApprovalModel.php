<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalModel extends Model
{
    use HasFactory;

    protected $table = '_approval';

    protected $fillable= [
        'meetingDate',
        'startTime',
        'endTime',
        'currentProgress',
        'discDetail',
        'actPlan'
    ];

    protected $guarded = ['studentId', 'lectureId','prososalID'];
    public $timestamps = false;

    public function fkproposal()
    {
        return $this->belongsTo('App\Models\ProposalModel','prososalID', 'prososalID');
    }

    public function fkStudent()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }

    public function fkLecture()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

    //display approval status
    public function indexapprovalstatus()
    {

        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $titlelist = TitleModel::Select()->where('lectureId',$user->lectureId)->get();

        return $titlelist;
    }


}
