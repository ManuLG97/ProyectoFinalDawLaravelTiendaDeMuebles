<?php

namespace App\Http\Controllers;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
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
        $users=auth()->user()->id;
        $produts= Producto::all();
        $admin=User::all();

       return view('products_admin.users_info',compact('admin','users'));
    }

    public function users()
    {
        $usuario=auth()->user()->id;
        $users= Producto::all();
        $admin=User::all();

        return view('admin.users_info',compact('admin','users'));

    }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        return view('admin.edit_user',compact('user'));
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
       $user = User::find($id);
    // dd($request);
     //  dd($request->all());
     // dd($user);


        $user->update(['name' => $request->name,
            'telefon' => $request->telefon,
            'address' => $request->address,
            'email' => $request->email,
            'password' =>Hash::make($request->password),

        ]);

       return view('admin.users_info')->with('toast','Registro actualizado satisfactoriamente');

    }



    public function contactar()
    {

        return view('admin.contacto');
    }


    public function ofertas()
    {
        return view('admin.ofertas');


    }

    public function novedades()
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
        User::destroy($id);
        return view('admin.users_info')->with('success','Registro actualizado satisfactoriamente');


    }
}
