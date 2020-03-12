<?php

namespace App\Http\Controllers;

use App\VehicleModel;
use App\Port;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
	public function fetchModels($id){
		return VehicleModel::where('company_id',$id)->get();
	}

	public function fetchPorts($id){
		return Port::where('country_id',$id)->get();
	}
}
