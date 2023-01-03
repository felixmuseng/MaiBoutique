<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function GetWelcomePage(Request $request){
        return view('welcome');
    }

    public function GetLoginPage(Request $request){
        return view('login');
    }

    public function GetRegisterPage(Request $request){
        return view('register');
    }

    public function GetHomePage(Request $request){
        $products = Product::orderBy('id')->paginate(8);
        return view('home', compact('products'));
    }

    public function GetProductPage(Request $request){
        $id = $request->route('productId');
        $product = Product::where('id', $id)->first();
        $cart = session('cart');

        return view('detail', ['cart'=>$cart, 'product'=>$product]);
    }

    public function getCartPage(){

        $cart = session('cart');
        $total = 0;

        foreach((array)$cart as $cartItem){
            $total += $cartItem->total;
        }

        return view('cart', compact('cart','total'));

    }

    public function GetAddProductPage(Request $request){
        return view('addproduct');
    }

    public function GetProfilePage(Request $request){
        $user = User::where('id',Auth::id())->first();
        return view('profile', compact('user'));
    }

    public function GetHistoryPage(Request $request){
        $transactions = TransactionHeader::where('customerId', Auth::id())->get();
        return view('history', compact('transactions'));
    }

    public function GetSearchPage(Request $request){
        $search = $request->query('search');

        $products = Product::where('productName', 'LIKE', "%$search%")->paginate(8);
        return view('search', compact('products','search'));
    }

    public function GetUpdatePassPage(Request $request){
        return view('editpass');
    }

    public function GetUpdateProfilePage(Request $request){
        return view('editprofile');
    }
}
