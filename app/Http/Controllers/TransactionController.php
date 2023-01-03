<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;

class TransactionController extends Controller
{
    public function cartAdd(Request $request){
        $id = $request->route('productId');
        // dd($id);
        $validated = $request->validate(['quantity'=>'required|min:1']);
        $quantity = $request->quantity;

        $cart = array();

        if($request->session()->has('cart')){
            $cart = session('cart');
        }

        $product = Product::where('id', $id)->first();
        // dd($product);

        $flag = false;

        foreach($cart as $cartItem){
            if($cartItem->product->id == $id){
                $cartItem->quantity = $quantity;
                $cartItem->total = $cartItem->quantity * $product->price;
                $flag = true;
                break;
            }
        }

        if(!$flag){
            $new = new Cart();
            $new->product = $product;
            $new->quantity = $quantity;
            $new->total = $product->price * $quantity;

            array_push($cart, $new);
        }

        session(['cart' => $cart]);

        return redirect()->back();
    }

    public function cartDelete(Request $request){

        $id = $request->route('productId');
        $cart = session('cart');

        foreach($cart as $i => $cartItem){
            if($cartItem->product->id == $id){
                unset($cart[$i]);
            }
        }

        session(['cart' => $cart]);

        return redirect()->back();
    }

    public function cartCheckOut(Request $request){

        $id = Auth::user()->id;
        $cart = session('cart');
        if($cart){
            $newTransHeader = new TransactionHeader();
            $newTransHeader->transactionDate = Carbon::now()->toDateTimeString();
            $newTransHeader->customerId = $id;
            $newTransHeader->push();

            $new_id = TransactionHeader::where('transactionDate', $newTransHeader->transactionDate)
                ->where('customerId', $id)
                ->first()
                ->id;

            foreach($cart as $cartItem){
                $newTransDetail = new TransactionDetail();
                $newTransDetail->productId = $cartItem->product->id;
                $newTransDetail->transactionId = $new_id;
                $newTransDetail->quantity = $cartItem->quantity;
                $newTransDetail->push();
            }
            $request->session()->forget('cart');

        }
        return redirect('/home');
    }

}
