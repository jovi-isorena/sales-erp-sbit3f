<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property string $OrderID
 * @property string $CustomerID
 * @property float $TotalAmount
 * @property string $ShippingAddress
 * @property int $PaymentMethod
 * @property string $OrderedDate
 * @property string $ReceivedDate
 * @property string $OrderStatus
 * @property Customer $customer
 * @property Ordereditem[] $ordereditems
 * @property Returneditem[] $returneditems
 */
class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'OrderID';

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
    protected $fillable = ['CustomerID', 'TotalAmount', 'ShippingAddress', 'PaymentMethod', 'OrderedDate', 'ReceivedDate', 'OrderStatus'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordereditems()
    {
        return $this->hasMany('App\Models\Ordereditem', 'OrderID', 'OrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returneditems()
    {
        return $this->hasMany('App\Models\Returneditem', 'OrderID', 'OrderID');
    }
}
