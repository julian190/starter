<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelationsController extends Controller
{
    public function hasone(){
        $user = \App\User::with(['phone'=> function($q){
            $q->select('code','phone_number','user_id');
        }])->find(1);
      //  $user->phone;
        return response()->json([$user]);

    }
}
