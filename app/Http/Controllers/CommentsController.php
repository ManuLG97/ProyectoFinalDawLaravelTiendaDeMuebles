<?php

namespace App\Http\Controllers;

use App\Comment;

use App\Post;
use App\Producto;
use App\User;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
  /*  public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
           'comment'=>'required|min:5|max:2000'
        ));

        $post=Post::find($post_id);

        $comment= new Comment();
        $comment->comment=$request->commet;
        $comment->approved=true;
        $comment->post()->associate($post);

        $comment->save();

        \Illuminate\Support\Facades\Session::flash('success', 'Se ha publicado el cometario');

        return redirect()->back;
    }*/

    public function store(Request $request,$id)
    {
        $user=auth()->user()->id;
        $products=Producto::all();
        $producto=Producto::find($id);
        $users=User::all();


        $photos= $producto->photos()->get('photo');
        // dd($photos);
        if($photos != null){
            $total = count($photos);
        }
        $this->validate($request, array(
            'comment'=>'required'
        ));


            $comment=Comment::create([
                'comment'=>$request->comment,
                'user_id'=>auth()->id(),
                'product_id'=>$request->product_id
            ]);
     // dd($comment);

            return view('comments',compact('producto','user','photos','total','users','products'))->with('success','Se ha añadido un producto');

    }


    public static function  getUserName($id){
        $user=User::all()->where('id',$id)->first();
        return $user->name;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id=auth()->user()->id;
        $user_info=User::find($user_id);
        $role=$user_info->hasRole("admin");
        if($role) {

            $producto = Producto::find($id);
            return view('products_admin.comments', compact('producto'));
        }else{
            $producto = Producto::find($id);
            return view('comments', compact('producto'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
}
