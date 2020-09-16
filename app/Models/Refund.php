<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $table="refund";
    protected $primaryKey="refundID";

    protected $fillable = [
        'driverID', 'total', 'bank', 'accountNumber', 'clientName', 'created_at', 'updated_at',
    ];
}
