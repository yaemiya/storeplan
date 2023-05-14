<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Date;

class Reservation extends Model
{
    // public function tables()
    // {
    //     return $this->belongsTo('App\Table');
    // }

    protected $dates= ['date'];
    protected $fillable = ['id', 'name','date', 'ppl', 'tel', 'mail', 'time', 'ppl', 'course_id', 'tbl_id', 'comment', 'memo'];


    public function courses()
    {
        return $this->belongsTo('App\Course');
    }
}
