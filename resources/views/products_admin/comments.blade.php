
@extends('layouts.app_admin')

@section('content')
    <br><br>  <br>
    <div class="comentarios2">

        @php
            $comments=\App\Comment::all();

        @endphp
        <div class="comm">

            @foreach($comments as $comment)
                @if($comment->product_id ==$producto->id)
                        <br/>{{\App\Http\Controllers\CommentsController::getUserName($comment->user_id)}}
                        <br>  <textarea  disabled>{{$comment->comment}}</textarea>

                        <form id="comentarioeliminar" action="{{route('comments.destroy',$comment->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button class="btn-primaryeliminar" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres borrar?')){return false;};">Eliminar</button>
                        </form><br>

                @endif

            @endforeach

        </div>


        <a href="{{route('user.show',$producto->id)}}"><button class="btn-primaryregistrar">Volver atras</button></a>
    </div>
@endsection