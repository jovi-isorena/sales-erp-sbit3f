<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ReleaseOrderID
 * @property int $ProductID
 * @property int $Quantity
 * @property string $CreatedBy
 * @property string $CreatedDate
 * @property string $ApprovedBy
 * @property string $ApprovedDate
 * @property string $Status
 * @property Product $product
 * @property Employee $employee
 * @property Employee $employee
 */
class Releaseorder extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'releaseorder';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ReleaseOrderID';

    /**
     * @var array
     */
    protected $fillable = ['ProductID', 'Quantity', 'CreatedBy', 'CreatedDate', 'ApprovedBy', 'ApprovedDate', 'Status'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvedby()
    {
        return $this->belongsTo('App\Models\Employee', 'ApprovedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdby()
    {
        return $this->belongsTo('App\Models\Employee', 'CreatedBy', 'EmployeeID');
    }
}
