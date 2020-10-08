<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Validators\CartItemValidator;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function index()
    {
        $product = Producto::all();
        return view('shop.shopping-cart')->with('product', $product);
    }

    public function show($id)
    {

        $products=Producto::all();
        $product=Producto::find($id);
        $users=User::all();


        return view('shop.shopping-cart',compact('product','products','users'));

    }


    public function getAddToCart(Request $request, $id)
    {
        $product = Producto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new \App\Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getAddToCartProduct(Request $request, $id)
    {
        $product = Producto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new \App\Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new \App\Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new \App\Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shppingCart');
        }
        $oldCart=Session::get('cart');
        $cart= new \App\Cart($oldCart);

        Stripe::serApiKey('');
        try{
            Stripe::create(array(
                "amount"=>$cart->totalPrice * 100,
                "currency"=>"usd",
                "source"=>$request->input('stripeToken'),
                "description"=>"Test cargar"
            ));
        }catch (\Exception $e){
            return redirect()->route('checkout')->width('error', $e->getMessage());

        }
        Session::forget('cart');
        return redirect()->route('home')->with('succes', 'Comprado con exito');

    }

//disminuir producto del carrito
    public function destroy(Request $request, $id)
    {
        $product = Producto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;


        $cart = new \App\Cart($oldCart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);

        $oldCart = Session::get('cart');
        $cart = new \App\Cart($oldCart);

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function removeAllItems(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new \App\Cart($oldCart);

        $request->session()->remove('cart', $cart);


        return view('/home');
    }

}