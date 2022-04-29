<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $BatchNo
 * @property string $TestDate
 * @property string $Tester
 * @property string $TestLocation
 * @property int $TotalTested
 * @property int $TotalGood
 * @property int $TotalDefective
 * @property Employee $employee
 * @property Qualitycontroltestitem[] $qualitycontroltestitems
 */
class QualityControlTest extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'qualitycontroltest';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'BatchNo';

    /**
     * @var array
     */
    protected $fillable = ['TestDate', 'Tester', 'TestLocation', 'TotalTested', 'TotalGood', 'TotalDefective'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tester()
    {
        return $this->belongsTo('App\Models\Employee', 'Tester', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualitycontroltestitems()
    {
        return $this->hasMany('App\Models\Qualitycontroltestitem', 'BatchNo', 'BatchNo');
    }
}
