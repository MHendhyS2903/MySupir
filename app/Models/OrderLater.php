<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLater extends Model
{
    use HasFactory;

    protected $table="order_later";
    protected $primaryKey ='orderLaterID';

    protected $fillable = ['driverID', 'id', 'pickupLoc', 'deliveryLoc', 'rentalDate', 'rentalTIme', 'status', 'rates', 'created_at', 'updated_at'];

    // public function post(){
    //     return $this->hasMany('App\Rating', 'postID');
    // }

    public function driver(){
    	return $this->belongsTo('App\Models\Driver', 'driverID');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User', 'id');
    }
}
