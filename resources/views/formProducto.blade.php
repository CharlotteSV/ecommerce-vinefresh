@extends('encabezado')

@section('page')
    <h1 class="display-4">Crear Producto</h1>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <form action="{{ route('crearProducto') }}" method="POST">
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

        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}">
        <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{ old('apellido') }}">
        <button class="btn btn-outline-primary btn-block" type="submit">Agregar</button>
    </form>
@endsection