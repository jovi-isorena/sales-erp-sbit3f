<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $SlaId
 * @property int $TicketConcurrency
 * @property int $L1MaxWaitingTime
 * @property int $L2MaxWaitingTime
 * @property int $L3MaxWaitingTime
 * @property int $L1MaxHandlingTime
 * @property int $L2MaxHandlingTime
 * @property int $L3MaxHandlingTime
 * @property int $MaxRepAwayTime
 * @property int $MaxTotalRepAwayTime
 * @property int $MaxRepBreakTime
 * @property int $MaxRepLunchTime
 * @property int $MaxTicketIdleTime
 */
class Ticketingsla extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ticketingsla';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'SlaId';

    /**
     * @var array
     */
    protected $fillable = ['TicketConcurrency', 'L1MaxWaitingTime', 'L2MaxWaitingTime', 'L3MaxWaitingTime', 'L1MaxHandlingTime', 'L2MaxHandlingTime', 'L3MaxHandlingTime', 'MaxRepAwayTime', 'MaxTotalRepAwayTime', 'MaxRepBreakTime', 'MaxRepLunchTime', 'MaxTicketIdleTime'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;
}
