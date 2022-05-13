<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $SupplierID
 * @property string $CompanyName
 * @property string $ContactNumber
 * @property string $Address
 * @property boolean $isActive
 * @property SupplierProduct[] $supplierProducts
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
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplierProducts()
    {
        return $this->hasMany('App\Models\SupplierProduct', 'SupplierID', 'SupplierID');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Models\Product', 'App\Models\SupplierProduct', 'SupplierID', 'ProductID', 'SupplierID','ProductID');
    }
}
