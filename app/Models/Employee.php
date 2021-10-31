<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $EmployeeID
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $Suffix
 * @property string $Birthdate
 * @property string $HomeAddress
 * @property string $AttendancePIN
 * @property int $DepartmentID
 * @property int $TeamID
 * @property int $SalaryGrade
 * @property int $Position
 * @property boolean $isActive
 * @property Department $department
 * @property Team $team
 * @property Salarygrade $salarygrade
 * @property Position $position
 * @property Comment[] $comments
 * @property Delivery[] $deliveries
 * @property Employeeattendance[] $employeeattendances
 * @property Payroll[] $payrolls
 * @property Purchaseorder[] $purchaseorders
 * @property Releaseorder[] $releaseorders
 * @property Representativehandledticket[] $representativehandledtickets
 * @property Socialsecuritynumber $socialsecuritynumber
 * @property Systemaccount $systemaccount
 * @property Team[] $teams
 * @property Ticket[] $tickets
 */
class Employee extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'EmployeeID';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'HomeAddress', 'AttendancePIN', 'DepartmentID', 'TeamID', 'SalaryGrade', 'Position', 'isActive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'DepartmentID', 'DepartmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'TeamID', 'TeamID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salarygrade()
    {
        return $this->belongsTo('App\Models\Salarygrade', 'SalaryGrade', 'SalaryGradeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'Position', 'PositionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'ReplyingRepId', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries()
    {
        return $this->hasMany('App\Models\Delivery', 'ReceivedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeattendances()
    {
        return $this->hasMany('App\Models\Employeeattendance', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payrolls()
    {
        return $this->hasMany('App\Models\Payroll', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseorders()
    {
        return $this->hasMany('App\Models\Purchaseorder', 'CreatedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function releaseorders()
    {
        return $this->hasMany('App\Models\Releaseorder', 'CreatedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function representativehandledtickets()
    {
        return $this->hasMany('App\Models\Representativehandledticket', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socialsecuritynumber()
    {
        return $this->hasOne('App\Models\Socialsecuritynumber', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany('App\Models\Team', 'TeamLeader', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'AssignedEmployee', 'EmployeeID');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function queue()
    {
        return $this->hasOne('App\Models\Queue', 'EmployeeID', 'EmployeeID');
    }
}
