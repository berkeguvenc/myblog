<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        $category = category::all();
        return view('front.index',['category'=>$category]);
    }
}
