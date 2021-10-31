<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $AttendanceID
 * @property string $EmployeeID
 * @property string $DateTimeIn
 * @property string $DateTimeOut
 * @property int $Undertime
 * @property int $Overtime
 * @property Employee $employee
 */
class Employeeattendance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employeeattendance';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'AttendanceID';

    /**
     * @var array
     */
    protected $fillable = ['EmployeeID', 'DateTimeIn', 'DateTimeOut', 'Undertime', 'Overtime'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'EmployeeID', 'EmployeeID');
    }
}
