<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $CommentID
 * @property string $TicketNo
 * @property string $CreatedDatetime
 * @property boolean $FromRep
 * @property string $ReplyingRepId
 * @property string $Content
 * @property Ticket $ticket
 * @property Employee $employee
 */
class Comment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'CommentID';

    /**
     * @var array
     */
    protected $fillable = ['TicketNo', 'CreatedDatetime', 'FromRep', 'ReplyingRepId', 'Content'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket', 'TicketNo', 'TicketNo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'ReplyingRepId', 'EmployeeID');
    }
}
