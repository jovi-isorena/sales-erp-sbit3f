<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $ProductID
 * @property int $AvailableStock
 * @property int $MinimumStockLimit
 * @property Product $product
 */
class Warehousestock extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'warehousestock';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ProductID';

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
    protected $fillable = ['AvailableStock', 'MinimumStockLimit'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'ProductID', 'ProductID');
    }
}
