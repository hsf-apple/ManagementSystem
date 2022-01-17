<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalModel extends Model
{
    use HasFactory;

    protected $table = '_approval';

    protected $fillable= [
       'status',
        'reasons'
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

        $titlelist = ProposalModel::Select()->where('lectureId',$user->lectureId)->with('studentprofile')->get();

        return $titlelist;
    }

    public function showspecificproposaldata($data)
    {
        $updatetitle = ProposalModel::findOrFail($data);

        return $updatetitle;
    }
    public function findmatricId($data)
    {
        $updatetitle = User::findOrFail($data);

        return $updatetitle;
    }

    //store
    public function store($data)
    {

        $addtitlefkvalue = $data->all();

        $addtitlefinal = new ApprovalModel($addtitlefkvalue);

        $addtitlefinal->save();
    }

}
