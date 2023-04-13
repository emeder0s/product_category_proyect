<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    //Relación uno a muchos
    public function products(){
        return $this->hasMany(Product::class); 
    }
}
