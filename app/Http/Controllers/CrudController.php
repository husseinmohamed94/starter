<?php

namespace App\Http\Controllers;

use App\Models\Offer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{

    public function __construct()
    {

    }

    public function getOffer(){
     return  Offer::get();
    }
    /*public function  store(){
        offer::create([
           'name' => 'offer3',
            'price' => '5000',
            'details' => 'offer details'
        ]);
    } */



public function create(){
    return view('offers.create');
}
public function store(Request $request){
   //validate data before insert to database


    $rules = $this->getRules();
    $messages = $this->getMessages();
    $validator = Validator::make($request->all(),$rules,$messages);
    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    //insert
    Offer::create([
       'name'     =>$request->name,
       'price'    =>$request->price,
        'details' =>$request->details,
    ]);
    return redirect()->back()->with(['success' => 'تم اضافه العرض بنجاح']);
}
protected  function  getMessages(){
    return $messages = [
        'name.required' => __('messages.offername require'),
        'name.unique'=> __('messages.offernameunique'),
        'price.numeric' => __('messages.offerpricenumeric'),
        'price.required' => __('messages.offerpricerequired'),
        'details.required'=> __('messages.offerdatailsrequire'),
    ];
}
protected  function  getRules(){
    return $rules = [
        'name' =>'required|max:100|unique:offers,name',
        'price' =>'required|numeric',
        'details' =>'required',
    ];
}
}
