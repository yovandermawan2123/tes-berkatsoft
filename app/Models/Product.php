<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','is_ready','image'];

    public function salesorder(){
        return $this->hasMany(SalesOrder::class);
    }

}
