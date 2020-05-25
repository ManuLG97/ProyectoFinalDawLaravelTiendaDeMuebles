<?php

namespace App\Http\Controllers;
use App\Producto;
use App\User;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
      $this->middleware(['auth','role:admin']);
    }

    public function index()
    {
        $user=auth()->user()->id;
        $products= Producto::all();
        return view('products.all_products',compact('products','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create_product");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user()->id;
        $products= Producto::all();
        $user_id=auth()->user()->id;
        $user_info=User::find($user_id);
        $role=$user_info->hasRole("admin");
        if($role){
            $path=$request->file('foto')->store('foto','public');
            Producto::create(['id_usuario'=>$user_id,
                'nombre_producto'=>$request->nombre_producto,
                'marca'=>$request->marca,
                'tipo_mueble'=>$request->tipo_mueble,
                'descripcion'=>$request->descripcion,
                'dimensiones'=>$request->dimensiones,
                'volum'=>$request->volum,
                'oferta'=>$request->oferta,
                'cantidad'=>$request->cantidad,
                'precio_sin_montaje'=>$request->precio_sin_montaje,
                'precio_con_montaje'=>$request->precio_con_montaje,
                'fragil'=>$request->fragil,
                'foto'=>$path
            ]);
            return view('admin.admin_home',compact('products','user'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $products= Producto::all();
        $user=auth()->user()->id;
        return view('products.all_products',compact('products','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Producto::find($id);
        $users=User::all();
        return view('products.edit',compact('products','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=auth()->user()->id;
        $products= Producto::all();
        $user_info=User::find($user);
        $role=$user_info->hasRole("admin");
        if($role){
            $property=Producto::find($id);
            $property->update(['description'=>$request->description,
                'price'=>$request->price,

                'nombre_producto'=>$request->nombre_producto,
                'marca'=>$request->marca,
                'tipo_mueble'=>$request->tipo_mueble,
                'description'=>$request->description,
                'dimensiones'=>$request->dimensiones,
                'volum'=>$request->volum,
                'oferta'=>$request->oferta,
                'cantidad'=>$request->cantidad,
                'precio_sin_montaje'=>$request->precio_sin_montaje,
                'precio_con_montaje'=>$request->precio_con_montaje,
                'fragil'=>$request->fragil,
               // 'foto'=>$request->$path


                // 'photo'=>$request->photo
            ]);
            return view('products.admin_index',compact('products','user'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=auth()->user()->id;
        $user_info=User::find($user);
        $role=$user_info->hasRole("admin");
        if($role){
            $product=Producto::find($id);
            $product->delete();
            $user=auth()->user()->id;
            $products= Producto::all();
            return view('products.admin_index',compact('products','user'));

        }
    }
}
