

@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-5">Productos</h1>
        @if($message=\Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

        <table  class="table">
            <thead>
           <tr>
               <th><h4>Lista productos</h4></th>
               <th></th> <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
               <th><button class="btn-primaryregistrar botonproductos"><a href="{{route('producto.create')}}">Nuevo producto</a></button>
               </th>
           </tr>
            <?php
            $products=\App\Producto::all();
            ?>

             <tr>   <th>Foto</th> <th>Nombre</th> <th>Marca</th> <th>Tipo mueble</th> <th>Descripción</th> <th>Dimensiones</th>
                 <th>Volum</th> <th>Oferta</th> <th>Cantidad</th> <th>Precio sin montaje</th> <th>Precio con montaje</th>
                 <th>Fragil</th> <th>Editar</th> <th>Eliminar</th>   <tr>
                @foreach($products as $product)
                    <td><br/><br/>

                        @if($product->foto!=null)<img src="{{asset('storage/'.$product->foto)}}" width="150px" height="100px">@endif
                    <button><a class="btn-primaryregistrar" href="{{route('producto.edit',$product->id)}}">Ver mas..</a></button>

                    </td>
                    <td class=""><br/>{{$product->nombre_producto}}</td>
                    <td>   <br/>{{$product->marca}}</td>
                    <td>   <br/>{{$product->tipo_mueble}}</td>
                    <td>   <br/>{{$product->descripcion}}  </td>
                    <td>   <br/>{{$product->dimensiones}}  </td>
                    <td>   <br/>{{$product->volum}}  </td>
                    <td>   <br/>{{$product->oferta}}  </td>
                    <td>   <br/>C{{$product->cantidad}}  </td>
                    <td>   <br/>{{$product->precio_sin_montaje}}  </td>
                    <td>   <br/>{{$product->precio_con_montaje}}  </td>
                    <td>   <br/>{{$product->fragil}}


                    </td>
                    <td><button><a class="btn-primaryregistrar" href="{{route('producto.edit',$product->id)}}">Edit</a></button></td>
                    <td>
                        <form action="{{route('producto.destroy',$product->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button  class="btn-primaryregistrar" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres borrar?')){return false;};">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            </thead>
        </table>
    </div>

@endsection

