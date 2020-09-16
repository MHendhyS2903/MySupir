<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table="location";
    protected $primaryKey="locID";

    protected $fillable = [
        'orderID', 'pickupLoc', 'pickupLong', 'pickupLat', 'deliveryLoc', 'deliveryLong', 'deliveryLat', 'created_at', 'updated_at',
    ];
}
