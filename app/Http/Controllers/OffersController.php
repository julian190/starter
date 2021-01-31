<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OffersController extends Controller
{
    //

    public function create(){

        return view('offer.create');
    }

    public function post(OfferRequest $request){

        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details

        ]);
//        $validator = Validator::make($request->all());
//
//        if($validator->fails()){
//            //return $validator->errors();
//            return redirect()->back()->withErrors($validator)->withInputs($request->all());
//        }
        return redirect()->back()->with(['sucess'=>"data saved successfully"]);
    }
}
