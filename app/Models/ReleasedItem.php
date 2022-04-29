<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property int $SerializedID
 * @property string $SerialNo
 * @property int $ReleaseOrderID
 * @property Releaseorder $releaseorder
 * @property Serializedproduct $serializedproduct
 */
class ReleasedItem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'releaseditem';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['SerializedID', 'SerialNo', 'ReleaseOrderID'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function releaseorder()
    {
        return $this->belongsTo('App\Models\Releaseorder', 'ReleaseOrderID', 'ReleaseOrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serializedproduct()
    {
        return $this->belongsTo('App\Models\Serializedproduct', 'SerializedID', 'ID');
    }
}
