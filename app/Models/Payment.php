<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table="payment";
    protected $primaryKey="paymentID";

    protected $fillable = [
        'orderID', 'method', 'bank', 'status', 'created_at', 'updated_at',
    ];

    public function order(){
    	return $this->belongsTo('App\Models\Order', 'orderID');
    }
}
