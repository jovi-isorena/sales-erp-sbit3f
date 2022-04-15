<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property string $SerialNo
 * @property int $ProductID
 * @property string $AddedOn
 * @property string $AddedBy
 * @property string $Location
 * @property string $Status
 * @property Employee $employee
 * @property Product $product
 */
class SerializedProduct extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'serializedproduct';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['SerialNo', 'ProductID', 'AddedOn', 'ModifiedOn', 'AddedBy', 'ModifiedBy', 'Location', 'Status'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addedby()
    {
        return $this->belongsTo('App\Models\Employee', 'AddedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modifiedby()
    {
        return $this->belongsTo('App\Models\Employee', 'ModifiedBy', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'ProductID', 'ProductID');
    }
}
