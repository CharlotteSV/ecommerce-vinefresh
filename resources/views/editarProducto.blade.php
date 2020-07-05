@extends('encabezado')

@section('page')
    <h1 class="display-4">Editar Producto {{ $producto->PRO_CODIGO }}</h1>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <form action="{{ route('updateProducto', $producto->PRO_CODIGO) }}" method="POST">
        @method('PUT')
        @csrf

        @error('nombre')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El nombre es obligatorio

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @enderror

        @error('apellido')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El apellido es obligatorio
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @enderror

        <input 
        type="text" 
        name="nombre" 
        placeholder="Nombre" 
        class="form-control mb-2" 
        value="{{ $producto->nombre }}">

        <input 
        type="text" 
        name="apellido" 
        placeholder="Apellido" 
        class="form-control mb-2" 
        value="{{ $producto->apellido }}">

        <button class="btn btn-outline-primary btn-block" type="submit">Editar</button>
    </form>

    {{-- <p>
        Nombre: <input type="text" size="15" maxlength="15" value={{$usuario->nombre}} name="nombre">
    </p>
    <p>
        Apellido: <input type="text" size="15" maxlength="15" value={{$usuario->apellido}} name="apellido">
    </p>
    <p>
        <input type="submit" value="Aceptar">
    </p> --}}
@endsection