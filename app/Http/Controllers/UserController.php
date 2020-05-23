<?php

namespace App\Http\Controllers;
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
        $user= User::all();
        return view('user_info.info',compact('user','usuario'));
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
        $usuario=User::find($id);
        $user=User::all();
        return view('user_info.edit',compact('user','usuario'));
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
            $usuario = User::find($id);
            $usuario->update(['name' => $request->name,
                'telefon' => $request->telefon,
                'address' => $request->address,
                'email' => $request->email,
               // 'password' => bcrypt($request->password),
                'password' => Hash::make($request->password),

            ]);
            return redirect()->route('home'); //es la ruta para admin se tiene que modificar!!
        }else{
            $usuario = User::find($id);
            $usuario->update(['name' => $request->name,
                'telefon' => $request->telefon,
                'address' => $request->address,
                'email' => $request->email,
             //   'password' => bcrypt($request->password),
                'password' =>Hash::make($request->password),

            ]);
        }
        return redirect()->route('home');
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
