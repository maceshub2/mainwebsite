<?php

namespace App;

use App\DealOnProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //second database connection
    protected $connection='mysql2';
    // remote table from second database
    protected $table='products';

    protected $casts = [
        'total_price' => 'float',
        'price' => 'float',
    ];


    public function images(){
        return $this->hasMany(Photo::class,'product_id');
    }
    public function product_model(){
        return $this->belongsTo(VehicleModel::class,'model');
    }
    public function product_company(){
        return $this->belongsTo(Company::class,'company');
    }
    public function product_type(){
        return $this->belongsTo(VehicleType::class,'type');
    }
    public function product_color(){
        return $this->belongsTo(VehicleColor::class,'color');
    }
    public function getPhotoAttribute(){
        return Photo::where(['product_id'=> $this->id])->first();
    }
    public function country(){
        return $this->belongsTo(Country::class,'stock_location');
    }


    /*Searching functions*/
    public function getYearFromAttribute()
    {
        $date=explode('/',$this->registration_date);
        if(isset($date[1])){
            return $date[1];
        }
        return 0;
    }
    public function getYearToAttribute()
    {
        $date=explode('/',$this->registration_date);
        if(isset($date[1])){
            return $date[1];
        }
        return now()->format('Y');
    }

    /*Deal On Product Relation*/
    public function options(){
        return $this->hasOne(DealOnProduct::class,'product_id');
    }
    public function getStatusProductAttribute(){
        $status=$this->status;
        $deal=DealOnProduct::where('product_id',$this->id)->first();
        if($deal){
            $status=$deal->status;
        }
        return $status;
    }
}
