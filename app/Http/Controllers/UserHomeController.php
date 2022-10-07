<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $trends = Product::where('price', '>', '500')->get();
        return view('user.home', compact('products', 'trends'));
    }



    public function addcart($id)
    {
        auth()->user()->products()->toggle($id);
        auth()->user()->products($id)->where('product_id', '=', $id)->update(['cart' => true]);
        return redirect()->back();
    }
    public function cart()
    {
        $products = auth()->user()->products()->where('cart', '=', true)->get();
        return view('user.cart', compact('products'));
    }
    public function deletecart($id)
    {
        auth()->user()->products()->detach($id);
        return redirect()->back();
    }







    public function addfavorite($id)
    {
        auth()->user()->products()->toggle($id);
        auth()->user()->products($id)->where('product_id', '=', $id)->update(['fav' => true]);


        return redirect()->back();
    }

    public function favorite()
    {

        $products = auth()->user()->products()->where('fav', '=', true)->get();


        return view('user.favorite', compact('products'));
    }
    public function deletefavorite($id)
    {
        auth()->user()->products()->detach($id);


        return redirect()->back();
    }

}
