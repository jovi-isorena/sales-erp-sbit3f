<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $DepartmentID
 * @property string $DepartmentName
 * @property string $DepartmentHeadName
 * @property boolean $isActive
 * @property Employee[] $employees
 * @property Team[] $teams
 */
class Department extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'department';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'DepartmentID';

    /**
     * @var array
     */
    protected $fillable = ['DepartmentName', 'DepartmentHeadName', 'isActive'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'DepartmentID', 'DepartmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany('App\Models\Team', 'DepartmentID', 'DepartmentID');
    }
}
