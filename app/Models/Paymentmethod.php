<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PaymentMethodID
 * @property string $CustomerID
 * @property string $MethodType
 * @property string $AccountNumber
 * @property string $AccountName
 * @property string $PinCode
 * @property string $ValidMonth
 * @property string $ValidYear
 * @property boolean $Saved
 * @property Customer $customer
 */
class Paymentmethod extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'paymentmethod';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'PaymentMethodID';

    /**
     * @var array
     */
    protected $fillable = ['CustomerID', 'MethodType', 'AccountNumber', 'AccountName', 'PinCode', 'ValidMonth', 'ValidYear', 'Saved'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'CustomerID', 'CustomerID');
    }
}
