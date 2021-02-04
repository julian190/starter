<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traitt\Julian;


class OffersController extends Controller
{
    //
use Julian;
    public function create(){

        return view('offer.create');
    }
    public function post(OfferRequest $request){

        $filename = $this->saveImage($request->photo,'Images/offers');

        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
            'Photo'=>$filename

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
    public function delete($ID){
        $offer = Offer::find($ID);
        if(!$offer){
            return redirect()->back()->with(['error'=>'something went wrong']);
        }
        $offer->delete();
        return redirect()->route('all')->with(['sucess'=>'deleted Sucessfully ']);
  }
    public function ajaxcreate(){
        return view('ajaxoffer.create');
    }
    public function ajaxpost(OfferRequest $request){
        $filename = $this->saveImage($request->photo,'Images/offers');
        $offer = Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
            'Photo'=>$filename
        ]);
        if($offer)
        {
        return response()->json([
           'status'=>true,
           'msg'=>"Record added successfully"]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>"Something went wrong"]);
        }


    }

}
