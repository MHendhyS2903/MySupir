<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLoc extends Model
{
    use HasFactory;

    protected $table="driver_loc";
    // protected $primaryKey="driverLocID";

    protected $fillable = [
        'driverID', 'location', 'lang', 'lat',
    ];

    public function driver(){
    	return $this->belongsTo('App\Models\Driver', 'driverID');
    }
}
