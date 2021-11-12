<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    use HasFactory;
    public $timestamps = false;
    
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
