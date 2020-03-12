<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    protected $connection='mysql';

    protected $fillable=[
        'user_id','logo','banner','bright_color','dark_color',
        'info1','info2','s_info_1','s_info_2','s_info_3','s_info_4',
        'icon_1','icon_2','icon_3'
    ];

}
