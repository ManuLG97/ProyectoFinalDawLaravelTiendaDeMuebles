<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=auth()->user()->id;
        $user_info=User::find($user);
        $role=$user_info->hasRole("admin");
        if($role){
            $admin=Producto::all();
            return view('admin.admin_home',compact('admin'));
        }else{
            $home=Producto::all();
        }
        return view('user.user_home',compact('home'));
    }
       //  return view('home');
       //  return view('home',compact('home'));




    public function show($id)
    {

        $products=Producto::all();
        $producto=Producto::find($id);
        $users=User::all();

        $photos= $producto->photos()->get('photo');
        // dd($photos);
        if($photos != null){
            $total = count($photos);
        }

        return view('info_product',compact('producto','photos','total','users','products'));

    }

    public function contactar()
    {

        return view('contact');
    }

    public function ofertas()
    {
        return view('ofertas');


    }

    public function novedades()
    {
        return view('novedades');
    }


}
