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
}
