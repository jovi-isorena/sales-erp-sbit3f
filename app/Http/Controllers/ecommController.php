<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ecommController extends Controller
{
    

    public function index()
    {
        return view('ecomm_customer.login');
    }


    
  
    


    public function register()
    {
        return view('ecomm_customer.register');
    }


}
