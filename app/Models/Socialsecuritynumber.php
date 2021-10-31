<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $EmployeeID
 * @property string $Philhealth
 * @property string $SSSNumber
 * @property string $TIN
 * @property string $PagibigNumber
 * @property Employee $employee
 */
class Socialsecuritynumber extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'socialsecuritynumber';

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
    protected $fillable = ['Philhealth', 'SSSNumber', 'TIN', 'PagibigNumber'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'EmployeeID', 'EmployeeID');
    }
}
