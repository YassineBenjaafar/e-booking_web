<?php

namespace App\Http\Controllers\Espace_client;

use Illuminate\Http\Request;
use App\Center;
use Auth;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        $client = Auth::guard('client')->user();
        $centers=[];
        if($client){
            $centers = Center::all();
            $client->employee->shouldFeedBack();
        }
        
        return view('espace_client.home',['centers' => $centers]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
