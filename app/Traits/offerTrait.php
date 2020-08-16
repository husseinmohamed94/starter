<?php
namespace App\Traits;

Trait OfferTrait
{


      function saveIamage($photo,$folder){
        //save photo in folder
        $file_extesion = $photo->getClientOriginalExtension();
        $file_name=time().'.'.$file_extesion;
        $path = $folder;
        $photo->move($path,$file_name);
        return $file_name;
    }
}
