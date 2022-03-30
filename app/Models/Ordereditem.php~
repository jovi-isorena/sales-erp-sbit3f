<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $OrderedItemID
 * @property string $OrderID
 * @property string $ProductID
 * @property int $Quantity
 * @property Order $order
 * @property Product $product
 */
class Ordereditem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ordereditem';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'OrderedItemID';

    /**
     * @var array
     */
    protected $fillable = ['OrderID', 'ProductID', 'Quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'OrderID', 'OrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'ProductID', 'ProductID');
    }
}
