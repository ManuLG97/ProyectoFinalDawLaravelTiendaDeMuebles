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
            return view('products.all_products',compact('products','user'));
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
        return view('products.edit_product',compact('products','users'));
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
        if($request->has('foto')){
            $path=$request->file('foto')->store('foto','public');
        }else{
            $path="";
                }

               $products=Producto::find($id);
               if($path!=""){
                   $products->update([
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
               }else{
                   $products->update([
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
               }
    //   return redirect()->route('products.all_products');

       //  return view('products.all_products',compact('products','user'));
          return view('products.all_products',compact('products','user'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);

        // return redirect()->route('products.all_products')->with('success','Registro actualizado satisfactoriamente');
        return view('products.all_products')->with('success','Registro actualizado satisfactoriamente');

        //}
    }
}
