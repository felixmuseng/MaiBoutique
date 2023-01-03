<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addProduct(Request $request){

        $validate = $request->validate([
            'productName' => 'required|unique:products|min:5|max:20',
            'price' => 'required|integer|min:1000',
            'detail' => 'required|min:5',
            'image' => 'required|image',
            'stock' => 'required|integer|min:1',
        ]);
        $file = $request->file('image');
        Storage::putFileAs('/public/productimg', $file, $validate['productName'].'.'.$file->extension());

        $new_Book = Product::create([
            'productName' => $validate['productName'],
            'price' => $validate['price'],
            'stock' => $validate['stock'],
            'detail' => $validate['detail'],
            'image' => $validate['productName'].'.'.$file->extension()
        ]);
        return redirect('/home');
    }
}
