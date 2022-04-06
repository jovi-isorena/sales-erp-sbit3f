<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\Queue;
use App\Models\Representativehandledticket;
use App\Models\Employee;
use App\Models\Ticketingsla;

class SessionController extends Controller
{
    //
    public function adminlogin()
    {
        return view('session.adminportal');
    }
    public function inventorylogin()
    {
        return view('session.inventoryportal');
    }
    public function ecommercelogin()
    {
        return view('session.ecommerceportal');
    }
    public function crmlogin()
    {
        return view('session.crmportal');
    }

    public function store(Request $request)
    {
        // ddd($request);
        $credentials = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required'
        ]);
        // dd($credentials);
        // if(auth()->login($credentials))
        // if(Auth::attempt([
        //     'Username' => $credentials['username']
        // ]))
        $getUser = User::where('Username',$credentials['username'])
            ->first();
        if($getUser != null){
            $validUser = password_verify($credentials['password'], $getUser->Password);
            if($validUser)
            {
                //for admin module user
                if($getUser->employee->DepartmentID == 1){
                    //add redirect functions here. You can use if statements to redirect to different routes depending on position
                }//end admin module

                //for inventory module user
                if($getUser->employee->DepartmentID == 2){
                    Auth::loginUsingId($getUser->EmployeeID);
                    $request->session()->regenerate();
                    
                    //inventory manager
                    if( auth()->user()->employee->Position == 3){
                        return redirect(route('inventoryDashboard'));
                    }
                    //stockman
                    else if( auth()->user()->employee->Position == 4){
                        return redirect(route(''));
                    }
                }//end inventory module

                //for e-commerce module user
                if($getUser->employee->DepartmentID == 3){
                }//end e-commerce module

                //for crm module user
                if($getUser->employee->DepartmentID == 4){
                    Auth::loginUsingId($getUser->EmployeeID);
                    $request->session()->regenerate();
                    //crm representative redirect
                    if( auth()->user()->employee->Position == 7){
                        DB::table('queue')
                            ->updateOrInsert(
        
                                ['EmployeeID' => auth()->user()->employee->EmployeeID],
                                ['TeamID' => auth()->user()->employee->TeamID,
                                'EnqueueTime' => now('Asia/Manila'),
                                // 'ActiveTickets' => $employee->tickets->count(),
                                'ActiveTickets' => Ticket::where('AssignedEmployee', auth()->user()->EmployeeID)
                                    ->where('AssignedDatetime', '<>', null )
                                    ->count(),
                                'OnlineStatus' => 'Hold'
                                ]
                            );
                            return redirect(route('repDashboard'));
                    }//crm reprensentative
                    
                    //crm leader
                    else if(auth()->user()->employee->Position == 8){
                        return redirect(route('leadDashboard'));
                    }//crm leader

                    //crm admin
                    else if(auth()->user()->employee->Position == 9){
                        return redirect(route('crmAdminDashboard'));
                    }
                    //crm admin
                        
                }//end crm module

                return redirect()->intended('home');
            }
        }

        
        

        return back()->withErrors([
            'username' => 'Incorrect username and/or password.'
        ]);

    }

    public function logout()
    {
        $employeeID = auth()->user()->EmployeeID;
        Auth::logout();
        Queue::where('EmployeeID', $employeeID)->delete();
        
        return redirect(route('home'));
    }


}
