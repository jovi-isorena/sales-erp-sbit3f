<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property int $PurchaseOrderID
 * @property int $ProductID
 * @property int $Quantity
 * @property Product $product
 * @property Purchaseorder $purchaseorder
 */
class PurchaseOrderItem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'purchaseorderitem';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['PurchaseOrderID', 'ProductID', 'Quantity', 'ReceivedQuantity', 'Status'];

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
    public function purchaseorder()
    {
        return $this->belongsTo('App\Models\Purchaseorder', 'PurchaseOrderID', 'ID');
    }
}
