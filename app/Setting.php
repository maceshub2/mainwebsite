<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=[
        'timezone','page_title','description','keywords',
        'contact_info','contact_email','contact_phone',
        'ga_tag','policy' ,'terms','about_us','user_id'
    ];
}
