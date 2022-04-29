<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property string $AccountType
 * @property string $EmployeeID
 * @property string $CustomerID
 * @property string $Username
 * @property string $Password
 * @property string $LastLoginAttempt
 * @property int $LoginAttemptCount
 * @property string $LockedUntil
 * @property boolean $isActive
 * @property Employee $employee
 * @property Customer $customer
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'systemaccount';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['AccountType', 'CustomerID', 'Username', 'Password'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['AccountType', 'EmployeeID', 'CustomerID', 'Username', 'Password', 'isFirstLogin', 'LastLoginAttempt', 'LoginAttemptCount', 'LockedUntil', 'isActive'];

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
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'EmployeeID', 'EmployeeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
<<<<<<< HEAD
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'CustomerID', 'CustomerID');
    }
=======
    protected $hidden = [
        'Password',
        'remember_token'
    ];
    
    public $timestamps = false;

    
}
?>



<!-- 
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
>>>>>>> inventory-module



    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
        'remember_token'
    ];

<<<<<<< HEAD
}
=======
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
} -->


>>>>>>> inventory-module
