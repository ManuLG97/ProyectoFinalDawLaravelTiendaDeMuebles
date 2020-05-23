@extends('properties.app')

@section('content')
    <div class="col-lg-12">

        <p class="my-4">Properties</p>

        <ul class="properties">
            <li><a href="#">All properties</a></li>
            <li>
                @foreach($properties as $property)
                    <a href="{{route('admin.show',$property->id)}}" @endforeach>My properties</a>
            </li>
            <li>
                <a href="{{route('admin.index')}}">All users info</a>
            </li>
        </ul>

        <br/>
        <br/>
        <br/>
        <table class="table">
            <thead>

            @foreach($properties as $property)
                <tr>
                    <td><br/><br/>
                        @if($property->photo!=null)<img src="{{asset('storage/'.$property->photo)}}" width="250px" height="200px">@endif
                    </td>
                    <td class="description-property2">{{$property->description}}
                        <br/>{{$property->price}} €
                        <br/>{{$property->type}}
                        <br/>Owner: {{\App\Http\Controllers\AdminController::getUserName($property->user_id)}}
                        <br/>Email: {{\App\Http\Controllers\AdminController::getUserEmail($property->user_id)}}
                    </td>
                    <td><button><a class="btn btn-primary" href="{{route('properties.edit',$property->id)}}">Edit</a></button></td>
                    <td>
                        <form action="{{route('properties.destroy',$property->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button  class="btn-delete" type="submit" onclick="if(!confirm('Are you sure?')){return false;};">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            </thead>
        </table>
    </div>

@endsection



@extends('layouts.app')

@section('content')


    <div id="noticias">

        <img src="imagenes/mueble-salon-economico.jpg" id="imgnoticiasuno" alt=""/>

        <img src="imagenes/mueble-salon.jpg" id="imgnoticiasdos"   alt=""/>

    </div>

    <div id="comprassugeridas">
        <div id="titulo"> Ofertas </div>
        <div>
            <div class="oferta">
                <img class="imagenessugeridas centrar" src="imagenes/mueble/knopparp.jpg" /> <br> <p class="centrar">Knopparp</p>
            </div>
            <div class="oferta"><img  class="imagenessugeridas centrar" src="imagenes/mueble/kullaberg.JPG" /> <p class="centrar">Kullaberg</p>  </div>
            <div class="oferta">
                <img class="imagenessugeridas centrar" src="imagenes/mueble/hammarn.JPG" /> <p class="centrar">Hammarn</p>     </div>
            <div class="vermas"> Ver mas ... </div>

        </div>

    </div>



    <div id="comprassugeridas">
        <div id="titulo"> Novedades </div>
        <div>
            <div class="oferta">
                <img class="imagenessugeridas centrar" src="imagenes/mueble/knopparp.jpg" /> <br> <p class="centrar">Knopparp</p>
            </div>
            <div class="oferta"><img  class="imagenessugeridas centrar" src="imagenes/mueble/kullaberg.JPG" /> <p class="centrar">Kullaberg</p>  </div>
            <div class="oferta">
                <img class="imagenessugeridas centrar" src="imagenes/mueble/hammarn.JPG" /> <p class="centrar">Hammarn</p>     </div>
            <div class="vermas"> Ver mas ... </div>

        </div>

    </div>

    <div id="comprassugeridas">
        <div id="titulo"> Lo mas vendido </div>
        <div>
            <div class="oferta">
                <img class="imagenessugeridas centrar" src="imagenes/mueble/knopparp.jpg" /> <br> <p class="centrar">Knopparp</p>
            </div>
            <div class="oferta"><img  class="imagenessugeridas centrar" src="imagenes/mueble/kullaberg.JPG" /> <p class="centrar">Kullaberg</p>  </div>
            <div class="oferta">
                <img class="imagenessugeridas centrar" src="imagenes/mueble/hammarn.JPG" /> <p class="centrar">Hammarn</p>     </div>
            <div class="vermas"> Ver mas ... </div>

        </div>

    </div>



    <div id="sobrenosotros">
        <div id="sobrenostrostitulo">SOBRE NOSOTROS</div>
        <div class="centrar">
            Somos la empresa Modern Forniture nos dedicamos a la venta de muebles online y en tienda desde 1997 para mas información o para contactar pulsa en el icono de contacto de aquí abajo
        </div>
        <div class="centrar">
            <img src="imagenes/iconos/phonebook.png"  alt="Icono para ir a la pagina contacto"/>
        </div>
    </div>



    <footer>
        <img src="imagenes/iconos/fb.png" alt="icono facebook"  />
        <img src="imagenes/iconos/insta.png" alt="icono facebook" />
        <img src="imagenes/iconos/icono-youtube.png" alt="icono youtube "  />

    </footer>



    </div>
    </div>

@endsection
