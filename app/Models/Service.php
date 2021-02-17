<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'services';
    protected $fillable = ['id','name','type','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];

    public function doctor(){
        return $this->belongsToMany('App\Models\Doctor','doctor_service','service_id','doctor_id');
    }
}


