<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PositionID
 * @property string $PositionName
 * @property int $InitialSalary
 * @property boolean $isActive
 * @property Salarygrade $salarygrade
 * @property Employee[] $employees
 */
class Position extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'position';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'PositionID';

    /**
     * @var array
     */
    protected $fillable = ['PositionName', 'InitialSalary', 'isActive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salarygrade()
    {
        return $this->belongsTo('App\Salarygrade', 'InitialSalary', 'SalaryGradeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Employee', 'Position', 'PositionID');
    }
}
