<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index(){
        $active='setting';
        $user=auth()->user();
        $data=$user->setting;

        return view('admin.setting',
            compact('data','user','active'));
    }

    public function update(Request $request){
        try{

            Setting::where('user_id',auth()->user()->id)->update($request->except('_token'));
            Session::flash('message', 'Setting has been successfully saved...');
            Session::flash('result', true);
        }catch (\Exception $e){
            Session::flash('message', 'Something went wrong please try again..');
        }
        return back();
    }

    public function showResetPassword(){
        $user=auth()->user();
        $active='password';
        return view('admin.password',
        compact('user','active'));
    }
    public function passwordUpdate(Request $request){
        try{
            $validate=Validator::make($request->all(),[
                'password'=> 'required',
                'c_password'=>'required |same:password'
            ]);
            if($validate->fails()){
                return back()->withErrors($validate->errors()->all());
            }
            if($request->current!=auth()->user()->pass){
                return back()->withErrors(['Current password is not matched..']);
            }
            User::where('id',auth()->user()->id)
                ->update([
                'password'=>Hash::make($request->password),
                'pass'=>$request->password
                ]);

            Session::flash('message', 'Password has been succeessfull updated...');
            Session::flash('result', true);
        }catch (\Exception $e){
            Session::flash('message', 'Something went wrong please try again later...');
        }
        return back();
    }
}
