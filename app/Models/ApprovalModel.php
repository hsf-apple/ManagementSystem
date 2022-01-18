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
        'reasons',
        'proposalID',
        'studentId',
    ];

    protected $guarded = [ 'lectureId',];
    public $timestamps = false;

    public function fkproposal()
    {
        return $this->belongsTo('App\Models\ProposalModel','proposalID', 'proposalID');
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
        $updatetitle = ProposalModel::where('proposalID',$data)->first();

        $matricID = $updatetitle->studentprofile->user_id;

        return $matricID;
    }
    public function findmatricId($data)
    {
        $updatetitle = User::findOrFail($data);

        return $updatetitle;
    }

    //store
    public function store($data)
    {
        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $datastore = $data->all();

        $object = new ApprovalModel($datastore,['studentId'=> $data->studentId, 'prososalID'=> $data->prososalID],);

        $user->Approval()->save($object);

    }

}
