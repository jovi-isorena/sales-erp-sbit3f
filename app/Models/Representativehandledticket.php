<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property string $TicketNo
 * @property string $AssignedDatetime
 * @property string $EmployeeID
 * @property string $ActionTaken
 * @property int $HandlingTime
 * @property Ticket $ticket
 * @property Employee $employee
 */
class Representativehandledticket extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'representativehandledticket';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['TicketNo', 'AssignedDatetime', 'EmployeeID', 'ActionTaken', 'HandlingTime'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo('App\Ticket', 'TicketNo', 'TicketNo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'EmployeeID', 'EmployeeID');
    }
}
