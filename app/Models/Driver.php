<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class Driver extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'driverID';
    protected $fillable = [
        'name', 'nohp', 'password', 'address', 'photo', 'gender', 'status'
    ];

    public function driver(){
        return $this->hasMany('App\Models\Order', 'driverID');
        return $this->hasMany('App\Models\Refund', 'driverID');
        return $this->hasMany('App\Models\Sim', 'driverID');
        return $this->hasMany('App\Models\DriverLoc', 'driverID');
        return $this->hasMany('App\Models\DriverVerification', 'driverID');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}
