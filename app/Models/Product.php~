<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $ProductID
 * @property string $Name
 * @property string $Brand
 * @property string $Category
 * @property string $Specification
 * @property float $SellingPrice
 * @property boolean $OnSale
 * @property string $Image
 * @property boolean $isActive
 * @property Cartitem[] $cartitems
 * @property Ordereditem[] $ordereditems
 * @property Purchaseorderitem[] $purchaseorderitems
 * @property Rating[] $ratings
 * @property Releaseorder[] $releaseorders
 * @property Returneditem[] $returneditems
 * @property Storestock $storestock
 * @property Warehousestock $warehousestock
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ProductID';

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
    protected $fillable = ['Name', 'Brand', 'Category', 'Specification', 'SellingPrice', 'OnSale', 'Image', 'isActive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartitems()
    {
        return $this->hasMany('App\Cartitem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordereditems()
    {
        return $this->hasMany('App\Ordereditem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseorderitems()
    {
        return $this->hasMany('App\Purchaseorderitem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Rating', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function releaseorders()
    {
        return $this->hasMany('App\Releaseorder', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returneditems()
    {
        return $this->hasMany('App\Returneditem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function storestock()
    {
        return $this->hasOne('App\Storestock', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function warehousestock()
    {
        return $this->hasOne('App\Warehousestock', 'ProductID', 'ProductID');
    }
}
