<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use App\Scopes\offerScopes;
class Offer extends Model
{

    protected  $table="offers";
    protected  $fillable =['name_ar','name_en','price','details_ar','details_en','created_at','updated_at','photo','status'];
    protected  $hidden =['created_at','updated_at'];
   // public  $timestamps = false;
    // register global scope

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new offerScopes);
    }


###################### local scopes #####################
    public function scopeinactive($query){
return $query->where('status',0);
    }

   
    public function scopeinvalid($query){
        return $query->where('status',0)->whereNull('details_ar');
            }
            
            
######################## end scopes #####################
//mutators
public function setNameENAttribute($value){
    $this->attributes['name_en']  = strtoupper($value);
}

}
