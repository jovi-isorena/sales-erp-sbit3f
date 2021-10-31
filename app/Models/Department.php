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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Employee', 'DepartmentID', 'DepartmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany('App\Team', 'DepartmentID', 'DepartmentID');
    }
}
