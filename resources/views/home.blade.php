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
                                    <a class="contacto" href="{{ url('contact/contacto') }}"> <img src="imagenes/iconos/phonebook.png"  alt="Icono para ir a la pagina contacto"/></a>
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
