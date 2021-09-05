<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    Public function index(){
        $name = 'FeedBack';
        
        return view('admin/FeedBack',['name'=>$name]);
    }
}
