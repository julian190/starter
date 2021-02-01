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

        $file_extenstion = $request -> photo -> getClientoriginalExtension();
        $file_name = time() .".".$file_extenstion;
        $path = "Images/offers";
        $request ->photo ->move($path,$file_name);

        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
            'Photo'=>$path."/".$file_name

        ]);
//        $validator = Validator::make($request->all());
//
//        if($validator->fails()){
//            //return $validator->errors();
//            return redirect()->back()->withErrors($validator)->withInputs($request->all());
//        }
        return redirect()->back()->with(['sucess'=>"data saved successfully"]);
    }
    public function all(){
        $offers = Offer::select('id','name','details','price')->get();
        return view('offer.all',compact('offers'));

    }
  public function edit($id){
        $offer= Offer::select('id','name','price','details')->find($id);
        if(!$offer){return "not found";}
        return view('offer.update',compact('offer'));
  }
  public function update(OfferRequest $request ,$id){
      $offer= Offer::select('id','name','price','details')->find($id);
      if(!$offer){return "not found";}
      $offer->update([
        'name'=> $request->name,
          'price'=> $request->price,
          'details'=> $request->details
      ]);
    return redirect()->back()->with('sucess','updated successfully');
  }

}
