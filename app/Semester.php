<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
	// table name
    protected $table = "semesters";
    
    public function program(){
        return $this->belongsTO('App\Program');
    }

    public function content(){
    	return $this->hasMany('App\Courses');
    }
	
}
