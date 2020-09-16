<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNow extends Model
{
    use HasFactory;

    protected $table="order_now";
    protected $primaryKey ='orderNowID';

    protected $fillable = ['driverID', 'id', 'pickupLoc', 'deliveryLoc', 'status', 'rates', 'created_at', 'updated_at'];

    // public function orderNow(){
    //     return $this->hasMany('App\Rating', 'orderNowID');
    // }

    public function driver(){
    	return $this->belongsTo('App\Models\Driver', 'driverID');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User', 'id');
    }
}
