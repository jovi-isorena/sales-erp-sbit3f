<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ProductID
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
 * @property Qualitycontroltestitem[] $qualitycontroltestitems
 * @property Rating[] $ratings
 * @property Releaseorderitem[] $releaseorderitems
 * @property Returneditem[] $returneditems
 * @property Serializedproduct[] $serializedproducts
 * @property Storestock $storestock
 * @property SupplierProduct[] $supplierProducts
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
     * @var array
     */
    protected $fillable = ['Name', 'Brand', 'Category', 'Specification', 'SellingPrice', 'OnSale', 'Image', 'isActive'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartitems()
    {
        return $this->hasMany('App\Models\Cartitem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordereditems()
    {
        return $this->hasMany('App\Models\Ordereditem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseorderitems()
    {
        return $this->hasMany('App\Models\Purchaseorderitem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualitycontroltestitems()
    {
        return $this->hasMany('App\Models\Qualitycontroltestitem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function releaseorderitems()
    {
        return $this->hasMany('App\Models\Releaseorderitem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returneditems()
    {
        return $this->hasMany('App\Models\Returneditem', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serializedproducts()
    {
        return $this->hasMany('App\Models\Serializedproduct', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function storestock()
    {
        return $this->hasOne('App\Models\Storestock', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplierProducts()
    {
        return $this->hasMany('App\Models\SupplierProduct', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function warehousestock()
    {
        return $this->hasOne('App\Models\Warehousestock', 'ProductID', 'ProductID');
    }
}
