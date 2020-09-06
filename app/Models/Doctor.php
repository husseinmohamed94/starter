<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hosptail;
class Doctor extends Model
{
    protected  $table="doctors";
    protected  $fillable =['name','title','hosptail_id','created_at','updated_at'];
    protected  $hidden =['created_at','updated_at','pivot'];
    public     $timestamps = true;

public function hosptital(){
    return $this->belongsTo('App\Models\Hosptail','hosptail_id','id');
}

public function services(){
    return $this->belongsToMany('App\Models\Service','doctor_services','doctor_id','service_id','id','id');
}
}
