<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = 'ID';
    protected $fillable = ['name','price','details','Photo'];
    protected $hidden = ['created_at','updated_at'];
    //
}
