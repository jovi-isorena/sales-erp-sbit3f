<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $TeamID
 * @property int $DepartmentID
 * @property string $TeamLeader
 * @property string $TeamName
 * @property boolean $isActive
 * @property Employee $employee
 * @property Department $department
 * @property Employee[] $employees
 * @property Queue[] $queues
 * @property Ticket[] $tickets
 * @property Ticketcategory[] $ticketcategories
 */
class Team extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'team';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'TeamID';

    /**
     * @var array
     */
    protected $fillable = ['DepartmentID', 'TeamLeader', 'TeamName', 'isActive'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'TeamLeader', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'DepartmentID', 'DepartmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'TeamID', 'TeamID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function queues()
    {
        return $this->hasMany('App\Models\Queue', 'TeamID', 'TeamID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'AssignedTeam', 'TeamID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketcategories()
    {
        return $this->hasMany('App\Models\Ticketcategory', 'AssignedTeam', 'TeamID');
    }
}
