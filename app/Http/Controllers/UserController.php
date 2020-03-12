<?php

namespace App\Http\Controllers;

use App\Display;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request){
        try{
            $user=User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password' => Hash::make($request->password),
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'domain' => $request->domain,
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'status' => 1,
            ]);
            Setting::create([
                'user_id' => $user->id
            ]);
            Display::create([
                'user_id' => $user->id
            ]);
            return response()->json(['result' => 'success']);
        }catch (\Exception $e){
            return response()->json(['result' => 'failed']);
        }
    }
}
