<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Models\Team;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
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
