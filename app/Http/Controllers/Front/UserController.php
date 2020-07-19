<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public  function  showAdminName(){
        return 'husseinmohamed';
    }
    public function  getIndex(){
        $data=[];
        $data['id']=10;
        $data['name']='husseinmohamed';

        $obj= new \stdClass();
        $obj->id = '54';
        $obj->name = 'ahmed';
        $obj->gander = 'male';
        $data=[];
        return view('welcome',compact('data'));
      //  return view('welcome')->with('data','$data');
    }
}
