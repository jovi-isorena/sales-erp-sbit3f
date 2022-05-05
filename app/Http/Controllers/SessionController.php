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
use Illuminate\Support\Carbon;

class SessionController extends Controller
{
    public function employeeportal(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('session.employeeportal');
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
            $currentTime = Carbon::now('Asia/Manila');
            //check if the account is locked using lockeduntil
            if($getUser->LockedUntil !== null){ // check if account is locked
                if($currentTime->diffInSeconds($getUser->LockedUntil, false) > 0){ // account is still locked
                    session()->flash('error', 'Account is locked. Please try again ' . Carbon::parse($getUser->LockedUntil)->diffForHumans());
                    return redirect()->back();
                }
                
            }

            if($validUser && $getUser->AccountType == 'employee'){ // login attempt successful
                // reset attempt counter
                $getUser->update([
                    'LastLoginAttempt' => $currentTime, 
                    'LoginAttemptCount' => 0,
                    'LockedUntil' => null,   
                    'isActive' => 1
                ]);
                Auth::loginUsingId($getUser->EmployeeID);
                $request->session()->regenerate();
                $request->session()->flash('success', 'Logged in successfully. Welcome, ' . auth()->user()->employee->FirstName . ' ' . auth()->user()->employee->LastName);
                
                // if its user's first login, prompt to change password
                if(auth()->user()->isFirstLogin == 1){
                    return redirect(route('firstLogin'));
                }


                //for admin module user
                if($getUser->employee->DepartmentID == 1){
                    //add redirect functions here. You can use if statements to redirect to different routes depending on position
                    if(auth()->user()->employee->Position == 2){
                        return redirect(route('adminDashboard'));
                    }
                }//end admin module

                //for inventory module user
                if($getUser->employee->DepartmentID == 2){
                    return redirect((route('inventoryLandingPage')));
                }//end inventory module

                //for e-commerce module user
                if($getUser->employee->DepartmentID == 3){

                    Auth::loginUsingId($getUser->EmployeeID);
                    $request->session()->regenerate();


                    return redirect(route('orderManagerDashboard'));


                }//end e-commerce module

                //for crm module user
                if($getUser->employee->DepartmentID == 4){
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
            else{ // failed attempt
                
                if($getUser->LastLoginAttempt == null){ // if there are no previous attempt
                    $getUser->update([
                        'LastLoginAttempt' => $currentTime, 
                        'LoginAttemptCount' => 1
                        // 'LoginAttemptCount' => $getUser->LastLoginAttempt == null ? 1 : $getUser->LastLoginAttempt + 1
                    ]);
                }
                else if($currentTime->diffInMinutes($getUser->LastLoginAttempt, false) > -1){ //check if the last attempt is within 10 mins
                    if($getUser->LoginAttemptCount >= 2){// attemp is already 2x
                        // this is 3rd failed attempt, set status to 2
                        $getUser->update([
                            'LastLoginAttempt' => $currentTime,
                            'LoginAttemptCount' => $getUser->LoginAttemptCount + 1,
                            'LockedUntil' => $currentTime->addMinutes(30),
                            'isActive' => 2
                        ]);
                        session()->flash('error', 'Account is locked. Please try again ' . Carbon::parse($getUser->LockedUntil)->diffForHumans());
                        return back();
                    }
                    else{ // this is not 3rd attempt
                        $getUser->update([
                            'LastLoginAttempt' => $currentTime, 
                            'LoginAttemptCount' => $getUser->LoginAttemptCount + 1
                        ]);
                    }
                }
                else{ //last attempt is not made within 10 minutes. reset attempt count
                    $getUser->update([
                        'LastLoginAttempt' => $currentTime,
                        'LoginAttemptCount' => 1
                    ]);
                }
                
            }
            // $getUser->update([
            //     'LastLoginAttempt' => $getUser->LastLoginAttempt == null ? 1 : $getUser->LastLoginAttempt + 1
            // ]);
        }

        
        
        session()->flash('error', 'Incorrect username and/or password.');
        return back();
        // return back()->withErrors([
        //     'username' => 'Incorrect username and/or password.'
        // ]);

    }

    public function firstlogin(){
        if(auth()->user()->isFirstLogin !== 1){
            return redirect(route('home'));
        }
        return view('systemaccount.firstlogin');
    }

    public function logout()
    {
        $employeeID = auth()->user()->EmployeeID;
        Auth::logout();
        Queue::where('EmployeeID', $employeeID)->delete();
        session()->flash('success', 'Successfully logged out.');
        return redirect(route('home'));
    }

    public function landingPage(){
        return view('nonadmin.inventory_landing_page');
    }
}
