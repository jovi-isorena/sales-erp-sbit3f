<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $TransactionNumber
 * @property int $SupplierID
 * @property string $CreatedBy
 * @property float $Total
 * @property string $OrderedDate
 * @property string $EstimatedDeliveryDate
 * @property Supplier $supplier
 * @property Employee $employee
 * @property Delivery $delivery
 * @property Purchaseorderitem[] $purchaseorderitems
 */
class Purchaseorder extends Model
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
    protected $primaryKey = 'TransactionNumber';

    /**
     * @var array
     */
    protected $fillable = ['SupplierID', 'CreatedBy', 'Total', 'OrderedDate', 'EstimatedDeliveryDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'SupplierID', 'SupplierID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'CreatedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function delivery()
    {
        return $this->hasOne('App\Delivery', 'TransactionNumber', 'TransactionNumber');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseorderitems()
    {
        return $this->hasMany('App\Purchaseorderitem', 'TransactionNumber', 'TransactionNumber');
    }
}
