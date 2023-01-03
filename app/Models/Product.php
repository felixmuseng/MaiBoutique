<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['productName','price','detail','image','stock'];

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class, 'productId', 'id');
    }
}
