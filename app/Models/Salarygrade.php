<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $SalaryGradeID
 * @property string $Grade
 * @property string $Step
 * @property float $Rate
 * @property boolean $isActive
 * @property Employee[] $employees
 * @property Payroll[] $payrolls
 * @property Position[] $positions
 */
class Salarygrade extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'salarygrade';
   
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'SalaryGradeID';

    /**
     * @var array
     */
    protected $fillable = ['Grade', 'Step', 'Rate', 'isActive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Employee', 'SalaryGrade', 'SalaryGradeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payrolls()
    {
        return $this->hasMany('App\Payroll', 'SalaryGradeID', 'SalaryGradeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function positions()
    {
        return $this->hasMany('App\Position', 'InitialSalary', 'SalaryGradeID');
    }
}
