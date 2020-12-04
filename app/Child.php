<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    //
    protected $fillable=['name','gender','dob','fathers_name','mothers_name','state_id','district_id','photo','image'];

    public function state()
    {
        return $this->belongsTo("App\State");
    }
    public function district()
    {
        return $this->belongsTo("App\District");
    }
}
