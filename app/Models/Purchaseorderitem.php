<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PurchaseItemID
 * @property int $TransactionNumber
 * @property string $ProductID
 * @property int $Quantity
 * @property float $BuyingPrice
 * @property Purchaseorder $purchaseorder
 * @property Product $product
 */
class Purchaseorderitem extends Model
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
    protected $primaryKey = 'PurchaseItemID';

    /**
     * @var array
     */
    protected $fillable = ['TransactionNumber', 'ProductID', 'Quantity', 'BuyingPrice'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseorder()
    {
        return $this->belongsTo('App\Purchaseorder', 'TransactionNumber', 'TransactionNumber');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'ProductID', 'ProductID');
    }
}
