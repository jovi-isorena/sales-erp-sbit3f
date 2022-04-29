<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ReleaseOrderID
 * @property int $TotalItemQuantity
 * @property int $LocationID
 * @property string $CreatedBy
 * @property string $CreatedDate
 * @property string $ApprovedBy
 * @property string $ApprovedDate
 * @property string $Status
 * @property Employee $employee
 * @property Location $location
 * @property Employee $employee
 */
class ReleaseOrder extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ReleaseOrder';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ReleaseOrderID';

    /**
     * @var array
     */
    protected $fillable = ['TotalItemQuantity', 'LocationID', 'CreatedBy', 'CreatedDate', 'ApprovedBy', 'ApprovedDate', 'Status'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdby()
    {
        return $this->belongsTo('App\Models\Employee', 'CreatedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'LocationID', 'LocationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvedby()
    {
        return $this->belongsTo('App\Models\Employee', 'ApprovedBy', 'EmployeeID');
    }

    public function items()
    {
        return $this->hasMany('App\Models\ReleaseOrderItem', 'ReleaseOrderID', 'ReleaseOrderID');
    }
}
