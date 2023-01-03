<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['productId','transactionId','quantity'];

    public function product(){
        return $this->belongsTo(Product::class, 'productId', 'id');
    }

    public function transactionHeader(){
        return $this->belongsTo(TransactionHeader::class, 'transactionId', 'id');
    }
}
