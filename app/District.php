<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $fillable=['state_id', 'district_name'];

    public function state()
    {
        return $this->belongsTo("App\State");
    }
    public function child()
    {
        return $this->hasMany("App\Child");
    }
}
