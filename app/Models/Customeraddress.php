<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property string $CustomerID
 * @property string $Address
 * @property string $Barangay
 * @property string $City
 * @property string $Zip
 * @property string $Type
 * @property Customer $customer
 */
class Customeraddress extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customeraddress';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['CustomerID', 'Address', 'Barangay', 'City', 'Zip', 'Type'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'CustomerID', 'CustomerID');
    }
}
