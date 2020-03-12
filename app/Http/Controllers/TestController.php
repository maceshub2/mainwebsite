<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('test');
    }
}
