<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $fillable = ['no_salesorder','name','id_customer','id_product','quantity','subtotal'];

    public function customer(){
        return $this->belongsTo(Customer::class , 'id_customer');
    }

    public function product(){
        return $this->belongsTo(Product::class , 'id_product');
    }
}
