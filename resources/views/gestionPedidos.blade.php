@extends('encabezadoadmin')

@section('page')
    <div class="container my-4">
        <h1 class="display-4">Gestión de Pedidos Sucursal {{$SUC_CODIGO}}</h1>

        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        
        <table class="table table-hover table-bordered">
            <div class="topnav form-inline">
                <nav class="navbar navbar-light">
                    <form>
                        <select name="tipo" class="form-control mr-sm-2" >
                            <option value="">Buscar por tipo</option>
                            <option value="PED_CODIGO">Código</option>
                            <option value="PED_EMAIL">Email</option>
                            <option value="PED_ESTADO">Estado</option>
                        </select>
                        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </nav>
            </div>
            <thead class="thead-dark">
              <tr>
                <th scope="col">#Código</th>
                <th scope="col">Email</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pedidos ?? '' as $item)
                @if ($item->PED_ESTADO == "activo")
                    <tr style="background-color: rgba(37, 175, 255, 0.164)">                   
                @else
                    <tr>
                @endif
                    <th scope="row">{{$item->PED_CODIGO}}</th>
                    <td>{{$item->PED_EMAIL}}</td>
                    <td>{{$item->PED_ESTADO}}</td>
                    <td style="form-inline">
                        <a class="btn btn-outline-info btn-sm" href="{{ route('verPedido', $item) }}">
                            Ver
                        </a>
                        <a class="btn btn-outline-warning btn-sm"  href="{{ route('editarPedido', $item) }}">
                            Editar
                        </a>
                        <form action="{{ route('deletePedido', $item) }}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$pedidos->links()}}
    </div>
@endsection