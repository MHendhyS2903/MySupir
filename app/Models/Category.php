<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table="categories";
    protected $primaryKey="categoryID";

    protected $fillable = [
        'name', 'image',
    ];

    // public function category(){
    //     return $this->hasMany('App\Rating', 'postID');
    // }
}
