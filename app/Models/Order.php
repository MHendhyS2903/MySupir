<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table="order";
    protected $primaryKey="orderID";

    protected $fillable = [
        'driverID', 'id', 'categoryID', 'startDate', 'endDate', 'startTime', 'endTime', 'status', 'rates', 'created_at', 'updated_at',
    ];

    public function order(){
        return $this->hasMany('App\Models\Cancellation', 'orderID');
        return $this->hasMany('App\Models\Complaint', 'orderID');
        return $this->hasMany('App\Models\Location', 'orderID');
        return $this->hasMany('App\Models\Payment', 'orderID');
        return $this->hasMany('App\Models\DriverVerification', 'orderID');
    }

    public function driver(){
    	return $this->belongsTo('App\Models\Driver', 'driverID');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User', 'id');
    }

    public function category(){
    	return $this->belongsTo('App\Models\Category', 'categoryID');
    }
}
