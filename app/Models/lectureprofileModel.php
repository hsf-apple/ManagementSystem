<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lectureprofileModel extends Model
{
    protected $table = 'lectureprofile';
    use HasFactory;

    protected $fillable= [
        'lectureName',
        'lecturePhone',
        'lecture_Skill',
        'skill_Level',
    ];

    protected $guard = ['user_id'];
    public $timestamps = false;

    public function inventoryusage()
    {
        return $this->hasMany('App\Models\inventoryUsage','lectureId','lectureId');
    }

    public function expertiseFK(){
        return $this -> hasMany('App\Models\ExpertiseModel', 'lectureId', 'lectureId');
    }

}
