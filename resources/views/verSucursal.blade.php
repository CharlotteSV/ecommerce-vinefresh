@extends('encabezadoadmin')

@section('page')
    @if ($SUC_CODIGO == "")
        <div class="card" style="margin: 50px">
            <h4 class="card-header">Seleccione una Sucursal</h4>
        </div>
    @else
        <div class="card" style="margin: 50px">
            <h4 class="card-header">Información Sucursal</h4>
            <div class="card-body">

            <!-- ESTRUCTURA FORMULARIO -->
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input
                type="text"
                name="codigo"
                id="codigo"
                placeholder="{{ $verSucursal->SUC_CODIGO }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="nombre">Ciudad:</label>
                <input
                type="text"
                name="nombre"
                id="nombre"
                placeholder="{{ $verSucursal->SUC_NOMBRE }}"
                class="form-control mb-2" disabled>
            </div>
        </div>
    @endif
    
@endsection