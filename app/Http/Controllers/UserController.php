<?php

namespace App\Http\Controllers;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

                return view('products.info_product', compact('producto', 'photos', 'total', 'users', 'products'));
            } else {
                $users=User::all();
            }
            return view('info_product', compact('producto', 'photos', 'total', 'users', 'products'));

        }


        /*
             $products=Producto::all();
             $producto=Producto::find($id);
             $users=User::all();

             $photos= $producto->photos()->get('photo');
             // dd($photos);
             if($photos != null){
                 $total = count($photos);
             }

             return view('info_product',compact('producto','photos','total','users','products'));
        */
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
                // 'password' => bcrypt($request->password),
                'password' => Hash::make($request->password),

            ]);

            return redirect()->route('admin/admin_home');
        }else{
            $users = User::find($id);
            $users->update(['name' => $request->name,
                'telefon' => $request->telefon,
                'address' => $request->address,
                'email' => $request->email,
                //   'password' => bcrypt($request->password),
                'password' =>Hash::make($request->password),

            ]);

        }
        return redirect()->route('home');

    }


    public function ofertas()
    {
      /*  $usuario=auth()->user()->id;
        $user_info=User::find($usuario);

        $role=$user_info->hasRole("admin");
        if($role){
            $users=User::all();
            return view('admin.ofertas',compact('users','usuario'));
        }else{
            $users=User::all();

        }
        return view('ofertas',compact('users','usuario'));*/

        return view('ofertas');
    }
    public function adminofertas()
    {
        return view('admin.ofertas');

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

    public function adminnovedades()
    {
        return view('admin.novedades');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}