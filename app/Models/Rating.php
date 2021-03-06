<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RatingID
 * @property string $CustomerID
 * @property int $ProductID
 * @property int $RateStar
 * @property string $RateReview
 * @property string $RateDate
 * @property string $RateStatus
 * @property Customer $customer
 * @property Product $product
 */
class Rating extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rating';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'RatingID';

    /**
     * @var array
     */
    protected $fillable = ['CustomerID', 'ProductID', 'RateStar', 'RateReview', 'RateDate', 'RateStatus'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'ProductID', 'ProductID');
    }
}
