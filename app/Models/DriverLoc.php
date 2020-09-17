<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLoc extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $table="driver_loc";
    // protected $primaryKey="driverLocID";

    protected $fillable = [
        'driverID', 'location', 'lang', 'lat',
    ];

    public function driver(){
    	return $this->belongsTo('App\Models\Driver', 'driverID');
=======
    protected $table="driver_loc";
    protected $primaryKey="driverLocID";

    protected $fillable = [
        'driverID', 'location', 'long', 'lat',
    ];

    public function driver(){
        return $this->belongsTo('App\Models\Driver', 'driverID');
>>>>>>> 3710203e2aa5b5116d5c295296d2fc19349caabd
    }
}
