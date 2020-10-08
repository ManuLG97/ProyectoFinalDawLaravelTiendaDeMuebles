
@extends('layouts.app')

@section('content')
    <br><br>  <br>
    <div class="comentarios2">

        @php
            $comments=\App\Comment::all();

        @endphp
        <div class="comm">

            @foreach($comments as $comment)
                @if($comment->product_id ==$producto->id)
                    @if($comment->user_id == \Illuminate\Support\Facades\Auth::id())
                        <br/> {{\App\Http\Controllers\CommentsController::getUserName($comment->user_id)}}
                        <br>  <textarea  disabled>{{$comment->comment}}</textarea>

                        <form id="comentarioeliminar" action="{{route('comments.destroy',$comment->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button class="btn-primaryeliminar" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres borrar?')){return false;};">Eliminar</button>
                        </form> <br>
                    @else
                        <br/> {{\App\Http\Controllers\CommentsController::getUserName($comment->user_id)}}
                        <br>  <textarea disabled>{{$comment->comment}}</textarea> <br>

                        {{--- <br> id product: {{$comment->product_id}} --}}
                    @endif
                @endif
            @endforeach
        </div>

        <div class="col-md-12">

                {{--- <form action="{{route('create_comment_path',['post'=>$producto->id])}}" method="post">--}}
                <form action="{{route('comments.store',['id'=>$producto->id])}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                       <br> <label for="comment"><strong>Comentario</strong>: </label><br>

                        <textarea rows="5" name="comment"  class="form-control" id="textocom" required oninvalid="this.setCustomValidity('Por favor rellene este campo')" oninput="setCustomValidity('')"></textarea>
                        <input class="edit-user" type="hidden" name="product_id" value="{{$producto->id}}"><br>
                        <button type="submit" class="btn-primaryregistrar">Publicar comentario</button><br>
                        <a href="{{route('home.show',$producto->id)}}"><button class="btn-primaryregistrar">Volver atras</button></a>

                    </div>
                </form>
        </div>
    </div>
@endsection