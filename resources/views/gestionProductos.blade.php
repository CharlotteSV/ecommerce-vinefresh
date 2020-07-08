@extends('encabezado')

@section('page')
    <div class="container my-4">
        <h1 class="display-4">Gestión de Productos Sucursal {{$SUC_CODIGO}}</h1>

        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        
        <table class="table">
            <div class="topnav" style="background-color:darkblue">
                <a class= "btn btn-primary", href="{{ route('formProducto', $SUC_CODIGO) }}">Crear Producto</a>
            </div>
            <thead class="thead-dark">
              <tr>
                <th scope="col">#Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($productos ?? '' as $item)
                <tr>
                    <th scope="row">{{$item->PRO_CODIGO}}</th>
                    <td>{{$item->PRO_NOMBRE}}</td>
                    <td>{{$item->PRO_PRECIO}}</td>
                    <td>{{$item->PRO_STOCK}}</td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="{{ route('editarProducto', $item) }}">
                            Editar
                        </a>

                        <form action="{{ route('deleteProducto', $item) }}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection