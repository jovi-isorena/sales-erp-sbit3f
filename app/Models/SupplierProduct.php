<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property int $SupplierID
 * @property int $ProductID
 * @property Product $product
 * @property Supplier $supplier
 */
class SupplierProduct extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'supplier_product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['SupplierID', 'ProductID'];

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
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'SupplierID', 'SupplierID');
    }
}
