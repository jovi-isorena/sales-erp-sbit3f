<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $SupplierID
 * @property string $CompanyName
 * @property string $ContactNumber
 * @property string $Address
 * @property boolean $isActive
 * @property Purchaseorder[] $purchaseorders
 */
class Supplier extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'supplier';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'SupplierID';

    /**
     * @var array
     */
    protected $fillable = ['CompanyName', 'ContactNumber', 'Address', 'isActive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseorders()
    {
        return $this->hasMany('App\Purchaseorder', 'SupplierID', 'SupplierID');
    }
}
