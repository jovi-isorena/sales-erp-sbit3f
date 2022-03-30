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
 * @property string $ContactNo
 * @property int $DepartmentID
 * @property int $TeamID
 * @property int $Position
 * @property boolean $isActive
 * @property Department $department
 * @property Position $position
 * @property Team $team
 * @property Comment[] $comments
 * @property Queue[] $queues
 * @property Releaseorder[] $releaseorders
 * @property Releaseorder[] $releaseorders
 * @property Representativehandledticket[] $representativehandledtickets
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
    protected $fillable = ['FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'HomeAddress', 'ContactNo', 'DepartmentID', 'TeamID', 'Position', 'isActive'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

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
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'Position', 'PositionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'TeamID', 'TeamID');
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
    public function queue()
    {
        return $this->hasOne('App\Models\Queue', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvedreleaseorders()
    {
        return $this->hasMany('App\Models\Releaseorder', 'ApprovedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdreleaseorders()
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
    public function systemaccount()
    {
        return $this->hasOne('App\Models\Systemaccount', 'EmployeeID', 'EmployeeID');
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
}
