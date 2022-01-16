<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExpertiseModel extends Model
{
    use HasFactory;
    protected $table = 'expertise';

    protected $fillable= [
        'lectureId',
        'expertiseName',
        'expertiseLevel'
    ];


    public $timestamps = false;

    public function lectureFK()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

    public function indexLecture(){
        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();
        
        $expertiseData = DB::table('lectureprofile')
        -> join('expertise', 'expertise.lectureId','=', 'lectureprofile.lectureId')
        -> join('user', 'user.id','=', 'lectureprofile.user_id')
        -> where('expertise.lectureId', $user->lectureId)
        -> select('expertise.*','lectureprofile.*','user.*')->get();
        
        return $expertiseData;
    }

    public function indexView($id){
        $lectureExpertise = DB::table('lectureprofile')-> join('expertise', 'expertise.lectureId','=', 'lectureprofile.lectureId')->where('expertise.lectureId', $id)->select('expertise.*','lectureprofile.*')->get();
        
        return $lectureExpertise;
    }
}
