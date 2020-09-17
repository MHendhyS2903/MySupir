<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;

    protected $table="sim";
    protected $primaryKey="simID";

    protected $fillable = [
        'simType', 'driverID', 'created_at', 'updated_at',
    ];

    public function driver(){
    	return $this->belongsTo('App\Models\Driver', 'driverID');
    }
}
