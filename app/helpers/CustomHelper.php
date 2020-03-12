<?php
namespace App\helpers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\archive;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
/*
*author :  Muhammad sajid
*Date   :  17-1-2020
*email  :  muhammadsajid9005@gmail.com
*/

class CustomHelper {

	/*this function is used for ajax to build dynamic breadcum*/
	public function callAPI($url)
	{
        $ch = curl_init();  
     
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //  curl_setopt($ch,CURLOPT_HEADER, false); 
     
        $output=curl_exec($ch);
     
        curl_close($ch);
        
        return json_decode($output);
	}
	
}
?>