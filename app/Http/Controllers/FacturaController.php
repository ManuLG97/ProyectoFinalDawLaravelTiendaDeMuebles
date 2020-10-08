<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Photos;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FacturaController extends Controller
{
    public function index()
    {
        $oldCart = Session::get('cart');
        $cart = new \App\Cart($oldCart);

        return view('shop.invoice', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function store(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new \App\Cart($oldCart);

        return view('shop.invoice', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

}
