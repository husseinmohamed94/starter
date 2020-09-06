<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class phone extends Model
{
    protected  $table="phone";
    protected  $fillable =['code','phone','user_id'];
    protected  $hidden =['created_at','updated_at','user_id'];
    public  $timestamps = false;


    ######################Begin relations ###################

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    ######################end relations ###################


}
