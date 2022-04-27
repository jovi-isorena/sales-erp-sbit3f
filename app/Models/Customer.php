<?php

namespace App\Models;
//nadagdag
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//nadagdag
/**
 * @property string $CustomerID
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $Suffix
 * @property string $Birthdate
 * @property string $Mobile
 * @property string $Email
 * @property string $Password
 * @property string $LastLoginAttempt
 * @property int $LoginAttemptCount
 * @property string $LockedUntil
 * @property string $Image
 * @property string $CustomerStatus
 * @property string $JoinDate
 * @property Cartitem[] $cartitems
 * @property Customeraddress[] $customeraddresses
 * @property Order[] $orders
 * @property Paymentmethod[] $paymentmethods
 * @property Rating[] $ratings
 * @property Returneditem[] $returneditems
 * @property Ticket[] $tickets
 */
class Customer extends Model
{
   

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'CustomerID';

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
    protected $fillable = ['CustomerID', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'Mobile', 'Email', 'Password', 'LastLoginAttempt', 'LoginAttemptCount', 'LockedUntil', 'Image', 'CustomerStatus', 'JoinDate'];


    protected $hidden = [
        'Password', 'remember_token',
    ];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartitems()
    {
        return $this->hasMany('App\Models\Cartitem', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customeraddresses()
    {
        return $this->hasMany('App\Models\Customeraddress', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentmethods()
    {
        return $this->hasMany('App\Models\Paymentmethod', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returneditems()
    {
        return $this->hasMany('App\Models\Returneditem', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'CreatedBy', 'CustomerID');
    }

  
 
}
