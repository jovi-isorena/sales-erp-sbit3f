<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PositionID
 * @property string $PositionName
 * @property boolean $AddItem
 * @property boolean $ItemListDetail
 * @property boolean $ModifyArchiveItem
 * @property boolean $CreatePurchaseOrder
 * @property boolean $PurchaseOrderListDetail
 * @property boolean $PurchaseOrderApprove
 * @property boolean $PurchaseOrderReceive
 * @property boolean $InitiateQualityControl
 * @property boolean $QualityControlListDetail
 * @property boolean $CreateRestockRequest
 * @property boolean $CancelRestockRequest
 * @property boolean $RestockRequestListDetail
 * @property boolean $RestockApproveDeny
 * @property boolean $isActive
 * @property Employee[] $employees
 */
class Position extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'position';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'PositionID';

    /**
     * @var array
     */
    protected $fillable = ['PositionName', 'AddItem', 'ItemListDetail', 'ModifyArchiveItem', 'CreatePurchaseOrder', 'PurchaseOrderListDetail', 'PurchaseOrderApprove', 'PurchaseOrderReceive', 'InitiateQualityControl', 'QualityControlListDetail', 'CreateRestockRequest', 'CancelRestockRequest', 'RestockRequestListDetail', 'RestockApproveDeny', 'isActive'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'Position', 'PositionID');
    }
}
