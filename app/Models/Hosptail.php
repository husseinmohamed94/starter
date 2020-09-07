<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\Doctor;

class Hosptail extends Model
{
    protected  $table="hosptails";
    protected  $fillable =['name','adderss','country_id','created_at','updated_at'];
    protected  $hidden =['created_at','updated_at'];
    public  $timestamps = true;



    public  function doctors(){
        return $this->hasMany('App\Models\Doctor','hosptail_id','id');

    }










}
 