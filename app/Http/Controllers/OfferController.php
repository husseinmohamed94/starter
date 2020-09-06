<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Http\Requests\offerRequest;

use App\Traits\OfferTrait;
use LaravelLocalization;
class OfferController extends Controller
{
    use OfferTrait;

    public function create(){
        //view form to add this offer
        return view('ajaxoffers.create');
    }

    public function store(offerRequest $request){
        //save offer into DB useing Ajax

       $file_name = $this->saveIamage($request->photo,'images/offers');


        //insert 
       $offer = Offer::create([
           'name_ar'     =>$request->name_ar,
           'name_en'     =>$request->name_en,
           'price'    =>$request->price,
            'details_ar' =>$request->details_ar,
            'details_en' =>$request->details_en,
            'photo' =>$file_name
        ]);
        if($offer)
        return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
        ]);
        else
        return response()->json([
            'status' => false,
            'msg' => '  فشل الحفظ برجاء المحتوله مره اخري',
        ]);
    }
public function all(){
    $offers = Offer::select('id','price',
    'name_'.LaravelLocalization::getCurrentLocale().' as name',
    'details_'.LaravelLocalization::getCurrentLocale().' as details',
    'photo'
)->get();
return view('ajaxoffers.all',compact('offers'));
}

public function delete(Request $request){

    $offer = offer::find($request->id);  //offer ::whwer('id','$offer_id')->first();
    if(!$offer)
    return redirect()->back()->with(['error' =>__('messages.offernotexist')]);
    
    $offer->delete();
    return response()->json([
        'status' => true,
        'msg' => 'تم الحذف  بنجاح',
        'id' => $request->id
    ]);
}

public function edit(Request $request){
   //Offer::findOrFail($offer_id);
   $offer =  Offer::find($request->offer_id);

   if(!$offer)
   return response()->json([
    'status' => false,
    'msg' => 'هذه العرض غير موجود   ',
    
]);

     $offer = Offer::select('id','name_ar','name_en','details_ar','details_en','price')->find($request->offer_id);
     ;
 
     return view('ajaxoffers.edit',compact('offer'));
 
    return $offer_id;
}
public function updata(Request $request){

    $offer = Offer::find($request->offer_id);

    if(!$offer)
    return response()->json([
        'status' => false,
        'msg' => 'هذه العرض غير موجود   ',
        
    ]);
    
     $offer->update($request -> all());
   /* $offer->update([
        'name_ar' =>$request->name_ar,
        'name_en' =>$request->name_en,
    ]);*/

    return response()->json([
        'status' => true,
        'msg' => 'تم العديل بنجاح   ',
        
    ]);
}
}
