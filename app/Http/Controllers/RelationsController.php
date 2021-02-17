<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Service;
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
    public function hospitals(){
        $hospitals = Hospital::select('id','name','address')->get();
        return View('hospital.hospitals',compact('hospitals'));
    }
    public function doctors($id){
        $hospital = Hospital::find($id);
        $doctors =  $hospital->doctor ;
        return view('hospital.doctors',compact('doctors'));
    }
    public function deleteDoctor($id){
        $hospital= Hospital::findOrFail($id);
        $hospital -> doctor()->delete();
        $hospital->delete();
        return redirect()->route('getAllHospitals');
    }
    public function serviceDoctor(){
        return $doctor = Service::with('doctor')->get();
        return $doctor->service;
    }
    public function getdocservices($id){

        $doc = Doctor::findOrFail($id);
        $services = $doc->service;

        $doctors = Doctor::select('id','name')->get();
        $specialists = Service::select('id','type')->get();
        return view('hospital.service',compact('services','doctors','specialists'));
    }
    public function saveServicesToDoctor(Request $request){
        //return $request;
        $doctor = Doctor::find($request->doctor_id);
        if(!$doctor)
            return abort('404');
        $doctor -> service() ->attach($request->service_ids);
        return 'success';
    }
}
