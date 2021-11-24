<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->EmployeeID,
            'type' => 'Employee',
            'attributes' =>[
                'FirstName' => $this->FirstName, 
                'MiddleName' => $this->MiddleName, 
                'LastName' => $this->LastName, 
                'Suffix' => $this->Suffix, 
                'Birthdate' => $this->Birthdate, 
                'HomeAddress' => $this->HomeAddress, 
                'AttendancePIN' => $this->AttendancePIN, 
                'DepartmentID' => $this->DepartmentID, 
                'TeamID' => $this->TeamID, 
                'SalaryGrade' => $this->SalaryGrade, 
                'Position' => $this->Position, 
                'isActive' => $this->isActive
            ]
        ];
    }
}
