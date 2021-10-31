<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $TransactionNumber
 * @property string $ReceivedBy
 * @property string $DeliveredDate
 * @property Purchaseorder $purchaseorder
 * @property Employee $employee
 */
class Delivery extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'delivery';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'TransactionNumber';

    /**
     * @var array
     */
    protected $fillable = ['ReceivedBy', 'DeliveredDate'];

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
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'ReceivedBy', 'EmployeeID');
    }
}
