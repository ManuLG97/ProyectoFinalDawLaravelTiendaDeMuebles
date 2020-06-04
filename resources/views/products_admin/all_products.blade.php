

@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-5"> <strong> Productos </strong> </h1>
        @if($message=\Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

        <table  class="table">
            <tr>
                <td class="centrar" colspan="14"><button class="btn-primaryregistrar botonproductos"><a href="{{route('producto.create')}}">Añadir nuevo producto</a></button> </td>
            </tr>
            <tr>
                <td colspan="14" class="tablastdtitulolista">  <h2> <strong>Lista productos </strong></h2>    </td>
            </tr>

            <?php
            $products=\App\Producto::all();
            ?>
            <tr>   <td class="tablastdtitulo">Foto</td> <td class="tablastdtitulo">Nombre</td> <td class="tablastdtitulo">Marca</td> <td class="tablastdtitulo">Tipo mueble</td> <td class="tablastdtitulo">Descripción</td> <td class="tablastdtitulo">Dimensiones</td>
                <td class="tablastdtitulo">Volum</td> <td class="tablastdtitulo">Oferta</td> <td class="tablastdtitulo">Cantidad</td> <td class="tablastdtitulo">Precio</td> <td class="tablastdtitulo">Precio con montaje</td>
                <td class="tablastdtitulo">Fragil</td> <td class="tablastdtitulo">Editar</td> <td class="tablastdtitulo">Eliminar</td>   <tr>
                @foreach($products as $product)
                    <td class="tablastd"><br/><br/>

                        @if($product->foto!=null)<img src="{{asset('storage/'.$product->foto)}}" width="150px" height="100px">@endif<br>
                        <button class="btn-primaryregistrar"><a href="{{route('producto.info',$product->id)}}">Ver mas fotos</a></button>

                    </td>
                    <td class="tablastd"><br/>{{$product->nombre_producto}}</td>
                    <td class="tablastd">   <br/>{{$product->marca}}</td>
                    <td class="tablastd">   <br/>{{$product->tipo_mueble}}</td>
                    <td class="tablastd">   <br/>{{$product->descripcion}}  </td>
                    <td class="tablastd">   <br/>{{$product->dimensiones}}  </td>
                    <td class="tablastd">   <br/>{{$product->volum}}  </td>
                    <td class="tablastd">   <br/>{{$product->oferta}}  </td>
                    <td class="tablastd">   <br/>{{$product->cantidad}}  </td>
                    <td class="tablastd">   <br/>{{$product->price}}  </td>
                    <td class="tablastd">    <br/>{{$product->precio_con_montaje}}  </td>
                    <td class="tablastd" >   <br/>{{$product->fragil}}


                    </td >
                    <td class="tablastd"><button class="btn-primaryregistrar"><a  href="{{route('producto.edit',$product->id)}}">Editar</a></button></td>
                    <td class="tablastd">
                        <form action="{{route('producto.destroy',$product->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button  class="btn-primaryeliminar" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres borrar?')){return false;};">Eliminar</button>
                        </form>
                    </td>
            </tr>

            @endforeach


        </table>
    </div>

@endsection

