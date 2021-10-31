<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ReturnID
 * @property string $CustomerID
 * @property string $OrderID
 * @property string $ProductID
 * @property int $ReturnQuantity
 * @property string $ReturnDescription
 * @property string $ReturnEvidence
 * @property string $ReturnStatus
 * @property Order $order
 * @property Product $product
 * @property Customer $customer
 */
class Returneditem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'returneditem';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ReturnID';

    /**
     * @var array
     */
    protected $fillable = ['CustomerID', 'OrderID', 'ProductID', 'ReturnQuantity', 'ReturnDescription', 'ReturnEvidence', 'ReturnStatus'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'OrderID', 'OrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'CustomerID', 'CustomerID');
    }
}
