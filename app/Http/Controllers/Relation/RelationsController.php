<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Hosptail;


use App\User;
use App\Models\phone;

class RelationsController extends Controller
{
  public function hasoneRelation(){

         return    $user = \App\  User::with(['phone'=> function($q){
                $q->select('code','phone','user_id');
            }])->find(2);
      //   return   $user->phone->code;

        //  return $user->phone;
             // return response()->json($user);
        // \App\User::Where('id',15)->first

        }

        public function hasoneRelationReverse(){

       // $phone = phone::with('user')->find(1);
       $phone = phone::with(['user'=>function($q){
            $q->select('id','name');
       }])->find(1);
        // make some attribute visible
       // $phone->makeVisible(['user_id']);
      //  $phone-> makeHidden(['code']);

       return $phone ; // return user of thas numbeer
        //return $phone;
        }

        public function getuserhasphone(){
           // $user = User::whereHas('phone')->get();
           $user = User::whereHas('phone',function($q){
               $q->where('code','02');
           })->get();

            return $user;
        }

        public function getusernothasphone(){
            $user = User::whereDoesntHave('phone',function($q){
                $q->where('expire','0');})->get();
            return $user;
        }
############################## one to many relationship metods ####################

        public function getHosptaiDoctor(){
              //   $hosptial = Hosptail::find(1); //   Hosptail::where('id',1)->first(); Hosptail::first()
                $hosptial = Hosptail::with('doctors')->find(1); //   Hosptail::where('id',1)->first(); Hosptail::first()

                //return $hosptial;
              //  return $hosptial->doctors; // return hospital doctors
               //return $hosptial->name;

              /* $doctors =  $hosptial->doctors;
               foreach($doctors as $doctor){
                echo   $doctor->name .'<br>';
               }*/

              $doctor =  Doctor::find(3);
           return   $doctor->hosptital->name;

        }

        public function hospitals(){

            $hosptials = Hosptail::select('id','name','adderss')->get();
            return view('doctors.hospitals',compact('hosptials'));
        }

        
        public function doctors($hostpitalid){
            $hosptial = Hosptail::find($hostpitalid);
            $doctors = $hosptial->doctors;

            return view('doctors.doctors',compact('doctors'));
        }


//get all hospital which must has doctors
        public function hospitalsHasDoctor(){
            $hosptials = Hosptail::whereHas('doctors')->get();
            return $hosptials;

        }

        public function hospitalsHasMale(){
            $hosptials = Hosptail::with('doctors')->whereHas('doctors',function($q){
                $q->where('gender',1);
            })->get();
            return $hosptials;
        }

        public function hospitalsNotHasDoctor(){
            $hosptials = Hosptail::whereDoesntHave('doctors')->get();
            return $hosptials;
        }


        public function deleteHospital($hostpitalid){
            $hosptial = Hosptail::find($hostpitalid);
            if(!$hosptial)
            return abort('404');
            //delete doctors in this hospital
            $hosptial->doctors()->delete();
            $hosptial->delete();
            return redirect()->back()->with(['success' => 'تم حذف  بنجاح']);

            

        }



    }
