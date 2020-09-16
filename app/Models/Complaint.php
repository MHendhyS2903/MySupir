<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table="complaint";
    protected $primaryKey="complaintID";

    protected $fillable = [
        'orderID', 'complaint', 'photo', 'created_at', 'updated_at',
    ];
}
