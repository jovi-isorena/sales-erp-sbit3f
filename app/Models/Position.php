<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PositionID
 * @property string $PositionName
 * @property boolean $isActive
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
    protected $fillable = ['PositionName', 'isActive'];

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
        return $this->hasMany('App\Models\Employee', 'Position', 'PositionID');
    }
}
