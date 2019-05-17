<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // table name
    protected $table = "courses";
    
    public function program(){
        return $this->belongsTO('App\Program');
    }

    public function semester(){
        return $this->belongsTO('App\Semester');
    }

    }
