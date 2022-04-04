<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommLoginSessionsController extends Controller
{

    //Stand by
    public function store(Request $request)
    {
        dd($request);


        return redirect(route('Home'));
    }
}
