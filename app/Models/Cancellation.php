<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancellation extends Model
{
    use HasFactory;

    protected $table="cancellation";
    protected $primaryKey="cancelID";

    protected $fillable = [
        'orderID', 'reason', 'created_at', 'updated_at',
    ];
}
