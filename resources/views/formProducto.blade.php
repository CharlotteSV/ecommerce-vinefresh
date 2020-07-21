@extends('encabezadoadmin')

@section('page')
    <div class="card" style="margin: 20px">
        <h4 class="card-header">Nuevo Producto Sucursal {{$SUC_CODIGO}}</h4>
        <div class="card-body">
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
                <div class="form-group">
                    <input
                    type="hidden"
                    name="sucursal"
                    id="sucursal"
                    class="form-control mb-2"
                    value="{{ $SUC_CODIGO }}">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre del producto</label>
                    <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    placeholder="Nombre Producto"
                    class="form-control mb-2"
                    value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción del producto</label>
                    <input
                    type="text"
                    maxlength="100"
                    name="descripcion"
                    id="descripcion"
                    placeholder="Descripción"
                    class="form-control mb-2"
                    value="{{ old('descripcion') }}">
                </div>

        <!-- COMBOBOX -->
                <div class="form-group">
                    <label for="formatomedida">Formato de medida del producto</label>
                    <select name="formatomedida" class="form-control mb-2">
                        <option></option>
                        @foreach($formatomedida as $item) 
                            <option value="{{ $item->FOR_CODIGO }}"> {{ $item->FOR_DESCRIPCION }} </option> 
                        @endforeach
                    </select>
                </div>
        <!-- FIN COMBOBOX -->

                <div class="form-group">
                    <label for="precio">Precio del producto</label>
                    <input
                    type="number"
                    maxlength="8"
                    name="precio"
                    id="precio"
                    placeholder="Precio"
                    class="form-control mb-2"
                    value="{{ old('precio') }}">
                </div>

                <div class="form-group">
                    <label for="stock">Stock producto</label>
                    <input
                    type="number"
                    maxlength="8"
                    name="stock"
                    id="stock"
                    placeholder="Stock"
                    class="form-control mb-2"
                    value="{{ old('stock') }}">
                </div>
                
                <button class="btn btn-outline-primary" type="submit">Crear Producto</button>
            </form>
        </div>
    </div>
@endsection