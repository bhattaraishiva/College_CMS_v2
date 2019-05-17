<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{	

    
    public function semester(){
        return $this->belongsTO('App\Semester');
    }


    public function course(){
        return $this->belongsTO('App\Course');
    }


    public function activesemester(){
        $instance =$this->hasMany('App\Semester');
        $instance->where('status','=',1);
        return $instance; 
    }

    public function activecourse(){
        $instance =$this->hasMany('App\Course');
        $instance->where('status','=',1);
        return $instance; 
    }

}
