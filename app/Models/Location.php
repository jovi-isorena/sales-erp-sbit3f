<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $LocationID
 * @property string $Name
 * @property string $Address
 * @property boolean $isActive
 */
class Location extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Location';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'LocationID';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Address', 'isActive'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;
}
