<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class SVHuntingModel extends Model
{
    use HasFactory;
    protected $table = '_title';
    protected $fillable= [
        'project_title',
        'objective',
        'project_scope',
        'problem_background',
        'software',
        'tools',
        'project_domain'
    ];

    protected $guarded = ['studentId','lectureId'];
    public $timestamps = false;

    public function lectureprofile()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }
    public function studentprofile()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }

    public function lectureList(){
        $listLecture = DB::table('proposal')
        -> join('expertise', 'expertise.lectureId','=', 'lectureprofile.lectureId')
        -> join('lectureprofile', 'lectureprofile.lectureId','=', 'proposal.lectureId')
        -> join('users', 'users.id','=', 'lectureprofile.user_id')
        -> join('users', 'users.id','=', 'lectureprofile.user_id')
        -> select('proposal.*','expertise.*','lectureprofile.*','users.*')
        -> get();
        
        return $listLecture;
    }

    public function viewProposal(){

    }

    public function changeProposal(){

    }

    public function updateProposal(){

    }

    public function deleteTitle(){
        
    }
}
