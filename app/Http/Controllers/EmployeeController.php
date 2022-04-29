<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Team;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $employees = Employee::all();
        return view('employee.index', [
            'employees' => $employees,
        ]);
    }

    public function create(){
        $departments = Department::where('isActive', 1)->get();
        $latestID = Employee::max('EmployeeID');
        return view('employee.create',[
            'departments' => $departments,
            'latestID' => $latestID
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'empid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contactno' => 'required',
            'department' => 'required'
        ]);

        $employee = Employee::make([
            'EmployeeID' => $request->input('empid'),
            'FirstName' => $request->input('firstname'), 
            'MiddleName' => $request->input('middlename'), 
            'LastName' => $request->input('lastname'), 
            'Suffix' => $request->input('suffix'), 
            'Birthdate' => $request->input('birthdate'), 
            'HomeAddress' => $request->input('address'), 
            'ContactNo' => $request->input('contactno'), 
            'DepartmentID' => $request->input('department'), 
            'TeamID' => null, 
            'Position' => null, 
            'isActive' => 1
        ]);

        $employee->save();
        return redirect(route('employeeIndex'));
    }

    public function getleaders(Team $team)
    {
        $leaders = [];
        foreach($team->employees as $employee){
            if($employee['Position'] == 8)
                $leaders[] = $employee;
        }
        return EmployeeResource::collection($leaders);
    }
}
