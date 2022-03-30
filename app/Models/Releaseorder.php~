<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ReleaseOrderID
 * @property string $ProductID
 * @property string $CreatedBy
 * @property int $Quantity
 * @property string $CreatedDate
 * @property string $Status
 * @property Product $product
 * @property Employee $employee
 */
class Releaseorder extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'releaseorder';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ReleaseOrderID';

    /**
     * @var array
     */
    protected $fillable = ['ProductID', 'CreatedBy', 'Quantity', 'CreatedDate', 'Status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'ProductID', 'ProductID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'CreatedBy', 'EmployeeID');
    }
}
