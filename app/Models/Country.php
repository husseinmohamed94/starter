<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected  $table="countries";
    protected  $fillable =['name'];
   // protected  $hidden =['created_at','updated_at'];
    public  $timestamps = false;

    public function doctors(){
        return $this->hasManyThrough('App\Models\Doctor','App\Models\Hosptail','country_id','hosptail_id','id','id');
    }
}
