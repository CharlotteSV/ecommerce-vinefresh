@extends('encabezado')

@section('page')
    <div class="container my-4">
        <h1 class="display-4">Gestión de Productos</h1>

        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($productos ?? '' as $item)
                <tr>
                    <th scope="row">{{$item->PRO_CODIGO}}</th>
                    <td>{{$item->PRO_NOMBRE}}</td>
                    <td>{{$item->PRO_PRECIO}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection