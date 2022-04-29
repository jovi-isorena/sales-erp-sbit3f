<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ReleaseOrderItemID
 * @property int $ReleaseOrderID
 * @property int $ProductID
 * @property int $Quantity
 * @property string $Statust
 * @property Releaseorder $releaseorder
 * @property Product $product
 */
class ReleaseOrderItem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ReleaseOrderItem';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ReleaseOrderItemID';

    /**
     * @var array
     */
    protected $fillable = ['ReleaseOrderID', 'ProductID', 'Quantity', 'Status'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function releaseorder()
    {
        return $this->belongsTo('App\Models\Releaseorder', 'ReleaseOrderID', 'ReleaseOrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'ProductID', 'ProductID');
    }
}
