<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name','tite','hospital_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    //
    public function hospital(){
        return $this->belongsTo('App/Models/Hospital','id','hospital_id');
    }
    public function service(){
        return $this->belongsToMany('App\Models\Service','doctor_service','doctor_id','service_id');
    }
}
