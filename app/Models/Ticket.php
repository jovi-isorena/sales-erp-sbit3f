<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $TicketNo
 * @property string $CreatedDatetime
 * @property string $EnqueuedDatetime
 * @property string $AssignedDatetime
 * @property string $ClosedDatetime
 * @property int $PriorityLevel
 * @property string $TransferringTeam
 * @property string $AssignedEmployee
 * @property int $CategoryID
 * @property int $AssignedTeam
 * @property string $Content
 * @property string $CreatedBy
 * @property string $TicketStatus
 * @property int $CSAT1
 * @property int $CSAT2
 * @property int $NPS
 * @property string $Feedback
 * @property string $RatingDatetime
 * @property boolean $Unread
 * @property Team $team
 * @property Ticketcategory $ticketcategory
 * @property Employee $employee
 * @property Customer $customer
 * @property Comment[] $comments
 * @property Representativehandledticket[] $representativehandledtickets
 * @property Ticketattachment[] $ticketattachments
 */
class Ticket extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ticket';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'TicketNo';

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
    protected $fillable = ['CreatedDatetime', 'EnqueuedDatetime', 'AssignedDatetime', 'ClosedDatetime', 'PriorityLevel', 'TransferringTeam', 'AssignedEmployee', 'CategoryID', 'AssignedTeam', 'Content', 'CreatedBy', 'TicketStatus', 'CSAT1', 'CSAT2', 'NPS', 'Feedback', 'RatingDatetime', 'Unread'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'AssignedTeam', 'TeamID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticketcategory()
    {
        return $this->belongsTo('App\Models\Ticketcategory', 'CategoryID', 'CategoryID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'AssignedEmployee', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'CreatedBy', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'TicketNo', 'TicketNo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function representativehandledtickets()
    {
        return $this->hasMany('App\Models\Representativehandledticket', 'TicketNo', 'TicketNo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketattachments()
    {
        return $this->hasMany('App\Models\Ticketattachment', 'TicketNo', 'TicketNo');
    }
}
