<?php


namespace App\Http\Controllers;

use App\Http\Requests\offerRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

use App\Events\VideoVieweer;
class CrudController extends Controller
{

    use OfferTrait;
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
public function store(offerRequest $request){
   //validate data before insert to database


    //$rules = $this->getRules();
    //$messages = $this->getMessages();
    //$validator = Validator::make($request->all(),$rules,$messages);
    //if($validator->fails()){
    //    return redirect()->back()->withErrors($validator)->withInput($request->all());
   // }

    $file_name = $this->saveIamage($request->photo,'images/offers');


    //insert
    Offer::create([
       'name_ar'     =>$request->name_ar,
       'name_en'     =>$request->name_en,
       'price'    =>$request->price,
        'details_ar' =>$request->details_ar,
        'details_en' =>$request->details_en,
        'photo' =>$file_name
    ]);
    return redirect()->back()->with(['success' => 'تم اضافه العرض بنجاح']);
}

public function getAlloffers(){
     $offers = Offer::select('id','price',
         'name_'.LaravelLocalization::getCurrentLocale().' as name',
         'details_'.LaravelLocalization::getCurrentLocale().' as details',
         'photo'

     )->get(); //return collction

     return view('offers.all',compact('offers'));
}

public function editOffer($offer_id){
    //Offer::findOrFail($offer_id);
  $offer =  Offer::find($offer_id);

  if(!$offer)
      return redirect()->back();
    $offer = Offer::select('id','name_ar','name_en','details_ar','details_en','price')->find($offer_id);

    return view('offers.edit',compact('offer'));

   return $offer_id;

}
public function updateOffer(offerRequest $request , $offer_id){

    $offer = Offer::find($offer_id);

    if(!$offer)
        return redirect()->back();
    // $offer->update($request -> all());
   /* $offer->update([
        'name_ar' =>$request->name_ar,
        'name_en' =>$request->name_en,
    ]);*/

    return redirect()->back()->with(['success' => 'تم تعديل العرض بنجاح']);
}
public function getVideo(){
    $video = Video::first();
    event(new VideoVieweer($video));
    return view('video')->with('video',$video);
}

public function delete($offer_id){
//check if odder id exists
 $offer = offer::find($offer_id);  //offer ::whwer('id','$offer_id')->first();
if(!$offer)
return redirect()->back()->with(['error' =>__('messages.offernotexist')]);

$offer->delete();
return redirect()->route('offers.all')->with(['success' =>__('messages.offerdeletesucces')]);


}
}
