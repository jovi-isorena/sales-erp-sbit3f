<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CustomerID
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $Suffix
 * @property string $Birthdate
 * @property string $Address
 * @property string $Barangay
 * @property string $City
 * @property string $Zip
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
    protected $fillable = ['FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'Address', 'Barangay', 'City', 'Zip', 'Mobile', 'Email', 'Password', 'LastLoginAttempt', 'LoginAttemptCount', 'LockedUntil', 'Image', 'CustomerStatus', 'JoinDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartitems()
    {
        return $this->hasMany('App\Cartitem', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentmethods()
    {
        return $this->hasMany('App\Paymentmethod', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Rating', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returneditems()
    {
        return $this->hasMany('App\Returneditem', 'CustomerID', 'CustomerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'CreatedBy', 'CustomerID');
    }
}
