@extends('encabezado')

@section('page')
    <h1 class="display-4">Crear Producto Sucursal {{$SUC_CODIGO}}</h1>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
<!-- VARIABLES OBLIGATORIAS -->
    <form action="{{ route('crearProducto') }}" method="POST">
        @csrf

        @error('nombre')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El nombre del producto es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @enderror

        @error('formatomedida')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El formato de medida del producto es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @enderror

        @error('descripcion')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                La descripción del producto es obligatoria
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @enderror

        @error('precio')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El precio es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @enderror

        @error('stock')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El stock es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @enderror
<!-- FIN VARIABLES OBLIGATORIAS -->        

<!-- ESTRUCTURA FORMULARIO -->
        <input
        type="hidden"
        name="sucursal"
        id="sucursal"
        class="form-control mb-2"
        value="{{ $SUC_CODIGO }}">
        <br>

        <label for="nombre">Nombre del producto</label>
        <input
        type="text"
        name="nombre"
        id="nombre"
        placeholder="Nombre Producto"
        class="form-control mb-2"
        value="{{ old('nombre') }}">
        <br>
<!-- COMBOBOX -->
        <label for="formatomedida">Formato de medida del producto</label>
        <div class="col-sm-9">
            <select name="formatomedida" class="form-control mb-2">
            <option></option>
               @foreach($formatomedida as $item) 
                    <option value="{{ $item->FOR_CODIGO }}"> {{ $item->FOR_DESCRIPCION }} </option> 
               @endforeach
           </select>
           <br>
<!-- FIN COMBOBOX -->
        <label for="descripcion">Descripción del producto</label>
        <input
        type="text"
        name="descripcion"
        id="descripcion"
        placeholder="Descripción"
        class="form-control mb-2"
        value="{{ old('descripcion') }}">
        <br>

        <label for="precio">Precio producto</label>
        <input
        type="number"
        maxlength="8"
        name="precio"
        id="precio"
        placeholder="Precio"
        class="form-control mb-2"
        value="{{ old('precio') }}">
        <br>

        <label for="stock">Stock producto</label>
        <input
        type="number"
        maxlength="8"
        name="stock"
        id="stock"
        placeholder="Stock"
        class="form-control mb-2"
        value="{{ old('stock') }}">
        <br>
        
        <button class="btn btn-outline-primary btn-block" type="submit">Agregar</button>
    </form>
@endsection