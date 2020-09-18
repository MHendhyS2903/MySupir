<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverVerification extends Model
{
    use HasFactory;
    protected $table="driver_verification";
    protected $primaryKey="verificationID";

    protected $fillable = [
        'driverID', 'orderID', 'photo', 'status',
    ];

    public function driver(){
        return $this->belongsTo('App\Models\Driver', 'driverID');
    }

    public function order(){
        return $this->belongsTo('App\Models\Order', 'orderID');
    }
}
