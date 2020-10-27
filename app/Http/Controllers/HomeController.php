<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brands=Brand::all();
        return view('backend.dashboard',compact('brands'));
    }
}
