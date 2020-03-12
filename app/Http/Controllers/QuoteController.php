<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class QuoteController extends Controller
{
	public function index(){
		$active='inquiries';
		$data=Quote::orderBy('id','desc')->get();
		return view('admin.quotes',compact(['active','data']));
	}
	public function store(Request $request){
		try{
			$validate=Validator::make($request->all(), [
				'name'=> 'required',
				'phone'=> 'required',
				'address'=> 'required',
				'city'=> 'required',
				'country'=> 'required',
				'email'=> 'required | email',
			]);
			if($validate->fails()){
				return back()->withErrors($validate->errors());
			}

			Quote::create([
				'user_name'=> $request->name,
				'user_email'=> $request->email,
				'user_address'=> $request->address,
				'user_city'=> $request->city,
				'user_country'=> $request->country,
				'user_port'=> $request->port,
				'user_phone'=> $request->phone,
				'product_id'=> $request->product_id,
				'price'=> $request->price,
			]);
			Session::flash('result',true);
		}catch(\Exception $e){

		}
		return back();
	}
}
