<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','no_telephone','image'];

    public function salesorder(){
        return $this->hasMany(SalesOrder::class);
    }

}
