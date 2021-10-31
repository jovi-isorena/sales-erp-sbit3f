<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PayrollID
 * @property string $EmployeeID
 * @property int $SalaryGradeID
 * @property float $TotalDeduction
 * @property float $NetPay
 * @property Employee $employee
 * @property Salarygrade $salarygrade
 */
class Payroll extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payroll';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'PayrollID';

    /**
     * @var array
     */
    protected $fillable = ['EmployeeID', 'SalaryGradeID', 'TotalDeduction', 'NetPay'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salarygrade()
    {
        return $this->belongsTo('App\Salarygrade', 'SalaryGradeID', 'SalaryGradeID');
    }
}
