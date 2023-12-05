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
 * @property string $Email
 * @property int $Location
 * @property int $DepartmentID
 * @property int $TeamID
 * @property int $Position
 * @property boolean $isActive
 * @property Location $location
 * @property Department $department
 * @property Position $position
 * @property Team $team
 * @property Comment[] $comments
 * @property Purchaseorder[] $purchaseorders
 * @property Purchaseorder[] $purchaseorders
 * @property Qualitycontroltest[] $qualitycontroltests
 * @property Queue[] $queues
 * @property Releaseorder[] $releaseorders
 * @property Releaseorder[] $releaseorders
 * @property Representativehandledticket[] $representativehandledtickets
 * @property Serializedproduct[] $serializedproducts
 * @property Serializedproduct[] $serializedproducts
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
    protected $fillable = ['EmployeeID', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'HomeAddress', 'ContactNo', 'Email', 'Location', 'DepartmentID', 'TeamID', 'Position', 'isActive'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'Location', 'LocationID');
    }

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
    public function createdpurchaseorders()
    {
        return $this->hasMany('App\Models\Purchaseorder', 'CreatedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receivedpurchaseorders()
    {
        return $this->hasMany('App\Models\Purchaseorder', 'ReceivedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualitycontroltests()
    {
        return $this->hasMany('App\Models\Qualitycontroltest', 'Tester', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function queues()
    {
        return $this->hasMany('App\Models\Queue', 'EmployeeID', 'EmployeeID');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modifiedserializedproducts()
    {
        return $this->hasMany('App\Models\Serializedproduct', 'ModifiedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addedserializedproducts()
    {
        return $this->hasMany('App\Models\Serializedproduct', 'AddedBy', 'EmployeeID');
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
