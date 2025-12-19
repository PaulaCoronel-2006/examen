@extends('layouts.app')
@section('contenido')
<div class="d-flex justify-content-between mb-3">
    <h1>Pedidos</h1>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary">Nuevo Pedido</a>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr><th>Cliente</th><th>Servicio</th><th>Estado</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->cliente }}</td>
            <td>{{ $pedido->servicio }}</td>
            <td><span class="badge bg-info">{{ $pedido->estado }}</span></td>
            <td>
                <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
