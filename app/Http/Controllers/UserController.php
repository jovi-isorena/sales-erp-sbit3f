<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Mail\AccountCreated;
use App\Mail\PasswordChanged;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        $positions = Position::where('isActive', 1)
            ->get();
        return view('systemaccount.create', [
            'employee' => $employee,
            'positions' => $positions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        //
        $request->validate([
            'employeeid' => 'required',
            'position' => 'required'
        ]);

        $username = strtolower($employee->FirstName[0] . $employee->LastName);
        $password = strtolower($employee->LastName.$employee->FirstName);
        $hashedPassword = Hash::make($password);

        $employee->update([
            'Position' => $request->input('position')
        ]);

        $user = User::make([
            'AccountType' => 'employee', 
            'EmployeeID' => $request->input('employeeid'),
            'CustomerID' => null, 
            'Username' => $username, 
            'Password'=> $hashedPassword,
            'isFirstLogin' => 1, 
            'LastLoginAttempt' => null, 
            'LoginAttemptCount' => null, 
            'LockedUntil' => null, 
            'isActive' => 1
        ]);

        $result = $user->save();
        if($result){
            $request->session()->flash('success', 'User account successfully created.');
            Mail::to($employee->Email)->send(new AccountCreated($employee, $user));
        }else{
            $request->session()->flash('warning', 'User account creation failed.');
        }
        return redirect(route('employeeIndex'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function deactivate(Request $request, User $user){
        $result = $user->update([
            'isActive' => 0
        ]);
        if($result){
            session()->flash('success', 'User account deactivated.');
        }else{
            session()->flash('warning', 'User account not deactivated.');
        }
        return redirect(route('employeeIndex'));
    }

    public function reactivate(Request $request, User $user){
        $result = $user->update([
            'isActive' => 1
        ]);
        if($result){
            session()->flash('success', 'User account reactivated.');
        }else{
            session()->flash('warning', 'User account reactivation failed.');
        }
        return redirect(route('employeeIndex'));
    }
    public function unlock(Request $request, User $user){
        $result = $user->update([
            'isActive' => 1
        ]);
        if($result){
            session()->flash('success', 'User account unlocked.');
        }else{
            session()->flash('warning', 'Failed to unlock user account.');
        }
        return redirect(route('employeeIndex'));
    }

    public function changepassword(Request $request, User $user){
        $request->validate([
            'curpass' => 'required',
            'newpass' => 'required|min:8|max:16',
            'conpass' => 'required|same:newpass'
        ]);
        // $user = auth()->user()->user; 
        // dd($user);
        $passwordCheck = Hash::check($request->input('curpass'), $user->Password);
        if(!$passwordCheck){
            return redirect()->back()->withErrors([
                'curpass' => 'Incorrect password'
            ]);
        }
        $hashedNewPassword = Hash::make($request->input('newpass'));
        $changed = $user->update([
            'Password' => $hashedNewPassword,
            'isFirstLogin' => 0
        ]);
        if($changed){
            $request->session()->flash('success', 'Password successfully changed.');
            Mail::to($user->employee->Email)->send(new PasswordChanged($user->employee));
            return redirect(route('home'));
            
        }else{
            $request->session()->flash('error', 'Password changed failed.');
            return redirect()-back();
        }
    }

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $positions = Position::where('isActive', 1)
            ->get();
        return view('systemaccount.edit', [
            'user' => $user,
            'positions' => $positions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'position' => 'required'
        ]);

        $employee = $user->employee();
        $result = $employee->update([
            'Position' => $request->input('position')
        ]);

        if($result){
            $request->session()->flash('success', 'Account access changed.');
        }else{
            $request->session()->flash('success', 'Account access changed.');
        }
        return redirect(route('employeeIndex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
