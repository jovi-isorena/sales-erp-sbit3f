<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $EmployeeID
 * @property string $Username
 * @property string $Password
 * @property string $LastLoginAttempt
 * @property int $LoginAttemptCount
 * @property string $LockedUntil
 * @property boolean $isActive
 * @property Employee $employee
 */
class Systemaccount extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'systemaccount';

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
    protected $fillable = ['Username', 'Password', 'LastLoginAttempt', 'LoginAttemptCount', 'LockedUntil', 'isActive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'EmployeeID', 'EmployeeID');
    }
}
