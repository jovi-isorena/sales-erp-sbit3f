<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ProductID
 * @property int $AvailableStock
 * @property int $MinimumStockLimit
 * @property Product $product
 */
class Storestock extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'storestock';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ProductID';

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
}
