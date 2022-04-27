<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Customeraddress;

//use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Auth; //nadagdag
use Illuminate\Support\Facades\DB; //nadagdag
use Dotenv\Exception\ValidationException; //nadagdag
class EcommSessionsController extends Controller
{


    public function login()
    {

      /*
        $customer = Customer::all();





        return view('ecomm_customer.login' , [

            'customer' => $customer

        ]);
        */

        return view('ecomm_customer.login');
    }

    //Create user
    public function store(Request $request)
    {
    

       // dd($request);

        $newImage = time() . '-' . $request->firstname . '.' .
        $request->customerImg->extension();

        $request->customerImg->move(public_path('ecomm_CustomerDP'), $newImage);

        $prefix = date("y");
        $id = rand(10000, 99999);

    //   $id = IdGenerator::generate(['Customer' => 'CustomerID', 'length' => 6, 'prefix' => $prefix]);
        $customID = $prefix."-".$id;
      
        $accounttype = 'customer';

        $customerStats = 'non-active';
        $customerIDex = 2;

        $password = $request->input('password');
        $hashedpass = Hash::make($password);

        $newCustomer = Customer::create([

            'CustomerID' => $customID,
           'Image' => $newImage,
           'FirstName' => $request->input('firstname'),
           'MiddleName' => $request->input('middlename'),
           'LastName' => $request->input('lastname'),
           'Suffix' => $request->input('suffix'),
           'Birthdate' => $request->input('birthdate'),
           'Mobile' => $request->input('mobile'),
           'Email' => $request->input('email'),
           'Password' =>  $hashedpass,
           'CustomerStatus' => $customerStats
          
        ]);

        $insertAlso = User::create([

          'AccountType' => $accounttype,
          'CustomerID' => $customID,
          'Username' => $request->input('email'),
          'Password' => $hashedpass 
        ]);



        return redirect(route('ecommlogin'));

    }

    //Login

    public function access(Request $request)
    {


      $currentDate = date('Y-m-d H:i:s');
    

      //  dd($request);

       $credentials = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

     
      

       // $email = $request->input('email');
       //  $password = $request->input('password');
       // $num = 1;

        $hashedpass = Hash::make($credentials['password']);


        $getCustomer = User::where('Username', $credentials['email'])
      //  ->where('Password', $hashedpass)
        ->first();


        if($getCustomer != null)
        {
           
             // $validCustomer = password_verify($credentials['password'], $getCustomer->Password);
       
            //$validCustomer =  $hashedpass == $getCustomer->Password;
          
            $valid = Hash::check($credentials['password'] , $getCustomer->Password);
            
            
            if($valid)
            {
            
                Auth::loginUsingId($getCustomer->ID);
                    $request->session()->regenerate();

                    DB::table('customer')
                    ->where('CustomerID', $getCustomer->CustomerID)
                    ->update(
                      ['LastLoginAttempt' => $currentDate]
                    );

              


                   // auth()->user()->customer->FirstName;



              


            
              
              /*

                     Auth::loginUsingId($getCustomer->CustomerID);
                        
                      $request->session()->regenerate();

           


                if(Auth::check())
              {
                return redirect()->intended('home');
              }
                if( auth()->user()->customer->Email == $email)
                {
                    DB::table('customer')
                    ->updateOrInsert(
                        [
                            'LoginAttempCount' => $num
                        ]
                    );
                }
                */
         
                return redirect(route('customerHome'));
     
            }


        }
        
        return back()->withErrors([
            'email' => 'Incorrect email and/or password.'
            
        ]);
   
     
    }

    public function upgradeAccount(Request $request)
    {

     

      $upgradeAccout = Customeraddress::create([

        'CustomerID' => $request->input('id'),
        'Address' => $request->input('address'),
        'Barangay' => $request->input('barangay'),
        'City' => $request->input('city'), 
        'Zip' => $request->input('zip'), 
        'Type' => $request->input('type') 

      ]);

      return redirect(route('ecommprofile'));


    }



    public function unload()
    {
      $customerID = auth()->user()->CustomerID;
        Auth::logout();
        return redirect(route('home'));
    }
}
