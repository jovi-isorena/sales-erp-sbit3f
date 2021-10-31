<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $CategoryID
 * @property string $Name
 * @property int $AssignedTeam
 * @property int $DefaultPriority
 * @property boolean $isActive
 * @property Team $team
 * @property Ticket[] $tickets
 */
class Ticketcategory extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ticketcategory';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'CategoryID';

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['Name', 'AssignedTeam', 'DefaultPriority', 'isActive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'AssignedTeam', 'TeamID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'CategoryID', 'CategoryID');
    }
}
