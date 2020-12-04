<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $fillable = ['state_name'];

    public function district()
    {
        return $this->hasMany("App\District");
    }
    public function child()
    {
        return $this->hasOne("App\Child");
    }
}
