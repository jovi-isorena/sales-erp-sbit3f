<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $CartID
 * @property string $CustomerID
 * @property string $ProductID
 * @property int $CartQuantity
 * @property float $CartPrice
 * @property Customer $customer
 * @property Product $product
 */
class Cartitem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cartitem';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'CartID';

    /**
     * @var array
     */
    protected $fillable = ['CustomerID', 'ProductID', 'CartQuantity', 'CartPrice'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'ProductID', 'ProductID');
    }
}
