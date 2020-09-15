<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderOntime extends Model
{
    use HasFactory;

    protected $table="order_ontime";
    protected $primaryKey ='orderOntimeID';

    protected $fillable = ['driverID', 'id', 'pickupLoc', 'deliveryLoc', 'startDate', 'startTIme', 'endDate', 'endlTIme', 'status', 'rates', 'created_at', 'updated_at'];

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
