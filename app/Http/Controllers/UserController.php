<?php

namespace App\Http\Controllers;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=auth()->user()->id;
        $user_info=User::find($usuario);


        $role=$user_info->hasRole("admin");
        if($role){
            $users=User::all();
            return view('admin.info',compact('users','usuario'));
        }else{
            $users=User::all();

        }
        return view('user.info',compact('users','usuario'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario=auth()->user()->id;
        $user_info=User::find($usuario);
        $products=Producto::all();
        $producto=Producto::find($id);

        $photos= $producto->photos()->get('photo');
        // dd($photos);
        if($photos != null) {
            $total = count($photos);

            $role = $user_info->hasRole("admin");
            if ($role) {
                $users=User::all();

                return view('products_admin.info_product', compact('producto', 'photos', 'total', 'users', 'products'));
            } else {
                $users=User::all();
            }
            return view('info_product', compact('producto', 'photos', 'total', 'users', 'products'));

        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_user=auth()->user()->id;
        $user_info=User::find($id_user);
        $users=User::find($id);
        $role=$user_info->hasRole("admin");
        if($role){
            $user=User::all();
            return view('admin.edit_admin',compact('user','id_user','users'));
        }else{
            $user=User::all();
        }
        return view('user.edit',compact('user','id_user','users'));
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
        $user_info=User::find($user);
        $role=$user_info->hasRole("admin");
        if($role){
            $users = User::find($id);

            $users->update(['name' => $request->name,
                'telefon' => $request->telefon,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]);

            return redirect()->route('admin/admin_home');
        }else{
            $users = User::find($id);

            $users->update(['name' => $request->name,
                'telefon' => $request->telefon,
                'address' => $request->address,
                'email' => $request->email,
                'password' =>Hash::make($request->password),

            ]);

        }
        return redirect()->route('home');

    }


    public function ofertas()
    {
        return view('ofertas');
    }


    public function novedades()
    {
        $usuario=auth()->user()->id;
        $user_info=User::find($usuario);

        $role=$user_info->hasRole("admin");
        if($role){
            $users=User::all();
            return view('admin.novedades');
        }else{
            $users=User::all();

        }

        return view('novedades');
    }


    public function admin_ofertas()
    {
        return view('admin.ofertas');

    }
    public function admin_novedades()
    {
        return view('admin.novedades');

    }

    public function admin_armarios()
    {
        return view('products_admin.armarios');

    }
    public function admin_camas()
    {
        return view('products_admin.camas');

    }
    public function admin_comodas()
    {
        return view('products_admin.comodas');

    }
    public function admin_escritorios()
    {
        return view('products_admin.escritorios');

    }
    public function admin_estanterias()
    {
        return view('products_admin.estanterias');

    }
    public function admin_lamparas()
    {
        return view('products_admin.lamparas');

    }
    public function admin_librerias()
    {
        return view('products_admin.librerias');

    }
    public function admin_mesas()
    {
        return view('products_admin.mesas');

    }
    public function admin_sillas()
    {
        return view('products_admin.sillas');

    }
    public function admin_sillones()
    {
        return view('products_admin.sillones');

    }
    public function admin_sofas()
    {
        return view('products_admin.sofas');

    }
    public function admin_taburetes()
    {
        return view('products_admin.taburetes');

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
            return view('products_admin.search',['products'=>$products, 'search'=>$query]);
        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //eliminar productos del carrito
    public function destroy($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new \App\Cart($oldCart);
        $cart->removeItem($id);


        Session::put('cart', $cart);
       // return redirect()->route('shop.shopping-cart');

        // return redirect()->back();
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }



  /*  public function destroy(Request $request,$id)
    {
        $product = Producto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;


           $cart = new \App\Cart($oldCart);
            $cart->remove($product, $product->id);
            $request->session()->put('cart', $cart);

            $oldCart = Session::get('cart');
            $cart = new \App\Cart($oldCart);


            $cart = Session::get('cart');
            //  unset($cart->items['qty']);

      //      unset($cart->items[$id]);


        Session::put('cart', $cart);
        // return redirect()->back();
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    } */
}