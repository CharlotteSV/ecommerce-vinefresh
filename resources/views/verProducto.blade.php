@extends('encabezadoadmin')

@section('page')
    <div class="card" style="margin: 50px">
        <h4 class="card-header">Ver Producto "{{ $verProducto->PRO_NOMBRE }}"</h4>
        <input type="hidden" value="{{$SUC_CODIGO=$verProducto->SUC_CODIGO}}">
        <div class="card-body">

            <!-- ESTRUCTURA FORMULARIO -->
            <div class="form-group">
                <input
                type="hidden"
                name="sucursal"
                id="sucursal"
                class="form-control mb-2"
                value="{{ $verProducto->SUC_CODIGO }}">
            </div>

            <div class="form-group">
                <label for="codigo">Código:</label>
                <input
                type="text"
                name="codigo"
                id="codigo"
                placeholder="{{ $verProducto->PRO_CODIGO }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input
                type="text"
                name="nombre"
                id="nombre"
                placeholder="{{ $verProducto->PRO_NOMBRE }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input
                type="text"
                name="descripcion"
                id="descripcion"
                placeholder="{{ $verProducto->PRO_DESCRIPCION }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="precio">Formato de medida:</label>
                <input
                type="text"
                name="precio"
                id="precio"
                placeholder="{{ $formatomedida->FOR_DESCRIPCION }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input
                type="text"
                name="precio"
                id="precio"
                placeholder="${{ $verProducto->PRO_PRECIO }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input
                type="text"
                name="stock"
                id="stock"
                placeholder="{{ $verProducto->PRO_STOCK }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="created">Fecha creación:</label>
                <input
                type="text"
                name="created"
                id="created"
                placeholder="{{ $verProducto->PRO_CREATED_AT }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="update">Fecha última modificación:</label>
                <input
                type="text"
                name="update"
                id="update"
                placeholder="{{ $verProducto->PRO_UPDATED_AT }}"
                class="form-control mb-2" disabled>
            </div>
        </div>
@endsection