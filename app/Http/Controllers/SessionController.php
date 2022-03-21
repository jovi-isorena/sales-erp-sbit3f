<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\Queue;

class SessionController extends Controller
{
    //
    public function login()
    {
        return view('session.login');
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
            $validUser = password_verify($credentials['password'], $getUser->Password) && 
                $getUser->employee->DepartmentID == 4;
            if($validUser)
            {
                Auth::loginUsingId($getUser->EmployeeID);
                // dd('true');
                $request->session()->regenerate();
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
                }
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
