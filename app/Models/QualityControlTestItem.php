<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $TestItemNo
 * @property int $BatchNo
 * @property int $ProductID
 * @property int $PurchaseOrderID
 * @property string $ManufacturerSerialNo
 * @property string $Condition
 * @property string $Remarks
 * @property Qualitycontroltest $qualitycontroltest
 * @property Purchaseorder $purchaseorder
 * @property Product $product
 */
class QualityControlTestItem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'qualitycontroltestitem';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'TestItemNo';

    /**
     * @var array
     */
    protected $fillable = ['BatchNo', 'ProductID', 'PurchaseOrderID', 'ManufacturerSerialNo', 'Condition', 'Remarks', 'CheckedIn'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualitycontroltest()
    {
        return $this->belongsTo('App\Models\Qualitycontroltest', 'BatchNo', 'BatchNo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseorder()
    {
        return $this->belongsTo('App\Models\Purchaseorder', 'PurchaseOrderID', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'ProductID', 'ProductID');
    }
}