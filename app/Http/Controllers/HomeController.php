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

    public function armarios()
    {

        return view('menu_products.armarios');

    }
    public function camas()
    {

        return view('menu_products.camas');

    }
    public function comodas()
    {

        return view('menu_products.comodas');

    }
    public function escritorios()
    {

        return view('menu_products.escritorios');

    }
    public function estanterias()
    {

        return view('menu_products.estanterias');

    }
    public function lamparas()
    {

        return view('menu_products.lamparas');

    }
    public function librerias()
    {

        return view('menu_products.librerias');

    }
    public function mesas()
    {

        return view('menu_products.mesas');

    }
    public function sillas()
    {

        return view('menu_products.sillas');

    }
    public function sillones()
    {

        return view('menu_products.sillones');

    }
    public function sofas()
    {

        return view('menu_products.sofas');

    }
    public function taburetes()
    {

        return view('menu_products.taburetes');

    }


    public function search(Request $request)
    {
        if($request){
            $query=trim($request->get('search'));

            $products=Producto::where('tipo_mueble','LIKE','%'.$query.'%')
                ->orWhere('nombre_producto','LIKE','%'.$query.'%')
                ->orWhere('descripcion','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->get();
            return view('search',['products'=>$products, 'search'=>$query]);
        }

    }

}
