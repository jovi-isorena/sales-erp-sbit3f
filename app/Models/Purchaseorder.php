<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property string $CreatedBy
 * @property string $CreatedDate
 * @property string $DeliveredBy
 * @property string $ReceivedBy
 * @property string $ReceivedDate
 * @property string $Status
 * @property Employee $employee
 * @property Employee $employee
 * @property Purchaseorderitem[] $purchaseorderitems
 */
class PurchaseOrder extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'purchaseorder';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['CreatedBy', 'CreatedDate', 'DeliveredBy', 'ReceivedBy', 'ReceivedDate', 'Status'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receivedby()
    {
        return $this->belongsTo('App\Models\Employee', 'ReceivedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdby()
    {
        return $this->belongsTo('App\Models\Employee', 'CreatedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseorderitems()
    {
        return $this->hasMany('App\Models\Purchaseorderitem', 'PurchaseOrderID', 'ID');
    }
}
