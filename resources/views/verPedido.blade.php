@extends('encabezadoadmin')

@section('page')
    <div class="card" style="margin: 50px">
        <h4 class="card-header">Ver Pedido "{{ $verPedido->PED_CODIGO }}"</h4>
        <input type="hidden" value="{{$SUC_CODIGO=$verPedido->SUC_CODIGO}}">
        <div class="card-body">

            <!-- ESTRUCTURA FORMULARIO -->
            <div class="form-group">
                <input
                type="hidden"
                name="sucursal"
                id="sucursal"
                class="form-control mb-2"
                value="{{ $verPedido->SUC_CODIGO }}">
            </div>

            <div class="form-group">
                <label for="codigo">Código:</label>
                <input
                type="text"
                name="codigo"
                id="codigo"
                placeholder="{{ $verPedido->PED_CODIGO }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="email">E-mail relacionado:</label>
                <input
                type="text"
                name="email"
                id="email"
                placeholder="{{ $verPedido->EMAIL }}"
                class="form-control mb-2" disabled>
            </div>

            <!--MOSTRAR TODOS LOS PRODUCTOS DEL PEDIDO-->
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#Código</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">$Precio</th>
                    </tr>
                </thead>
                <tbody class="card-body">
                    @foreach ($contenidopedido ?? '' as $item)
                        <tr>
                            <th scope="row">{{$item->PRO_CODIGO}}</th>
                            <td>{{$item->CON_CANTIDAD}}</td>
                            <td>${{$item->CON_PRECIO}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--FIN MOSTRAR TODOS LOS PRODUCTOS DEL PEDIDO-->

            <div class="form-group">
                <label for="total">Total:</label>
                <input
                type="text"
                name="total"
                id="total"
                placeholder="{{ $verPedido->PED_TOTAL }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input
                type="text"
                name="estado"
                id="estado"
                placeholder="{{ $verPedido->FOR_ESTADO}}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="pago">Medio de pago:</label>
                <input
                type="text"
                name="pago"
                id="pago"
                placeholder="{{ $verPedido->PED_PAGO }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="comprobante">Comprobante:</label>
                <input
                type="text"
                name="comprobante"
                id="comprobante"
                placeholder="{{ $verPedido->PED_COMPROBANTE }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="created">Fecha creación:</label>
                <input
                type="text"
                name="created"
                id="created"
                placeholder="{{ $verPedido->PED_CREATED_AT }}"
                class="form-control mb-2" disabled>
            </div>

            <div class="form-group">
                <label for="update">Fecha última modificación:</label>
                <input
                type="text"
                name="update"
                id="update"
                placeholder="{{ $verPedido->PED_UPDATED_AT }}"
                class="form-control mb-2" disabled>
            </div>
        </div>
@endsection