


@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Todos los productos</h1>
        <form class="form-propertie" action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            Description
            <br/>
            <textarea class="new-propertie" type="text" name="description"></textarea>
            <br/><br/>
            Price
            <br/>
            <input class="new-price" type="number" name="precio_sin_montaje">
            <br/><br/>
            <input class="new-photo" type="file" name="foto">
            <br/><br/>
            <input class="save-propertie" type="submit" class="btn btn-primary" value="Save">
            <br/>
        </form>
        <br/>
    </div>

@endsection