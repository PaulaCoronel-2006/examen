@extends('layouts.app')

@section('titulo', 'Editar Pedido')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h1 class="h4 mb-0">Editar Pedido de: {{ $pedido->cliente }}</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                    @csrf 
                    @method('PUT') <div class="mb-3">
                        <label class="form-label">Nombre del Cliente *</label>
                        <input type="text" name="cliente" class="form-control" 
                               value="{{ $pedido->cliente }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono *</label>
                        <input type="text" name="telefono" class="form-control" 
                               value="{{ $pedido->telefono }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Servicio Solicitado *</label>
                        <select name="servicio" class="form-select" required>
                            <option value="Lavado por Libras" {{ $pedido->servicio == 'Lavado por Libras' ? 'selected' : '' }}>Lavado por Libras</option>
                            <option value="Secado" {{ $pedido->servicio == 'Secado' ? 'selected' : '' }}>Secado</option>
                            <option value="Tintorería" {{ $pedido->servicio == 'Tintorería' ? 'selected' : '' }}>Tintorería</option>
                            <option value="Planchado" {{ $pedido->servicio == 'Planchado' ? 'selected' : '' }}>Planchado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad de Prendas *</label>
                        <input type="number" name="cantidad_prendas" class="form-control" 
                               value="{{ $pedido->cantidad_prendas }}" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estado del Pedido</label>
                        <select name="estado" class="form-select">
                            <option value="Recibido" {{ $pedido->estado == 'Recibido' ? 'selected' : '' }}>Recibido</option>
                            <option value="En Lavado" {{ $pedido->estado == 'En Lavado' ? 'selected' : '' }}>En Lavado</option>
                            <option value="Listo" {{ $pedido->estado == 'Listo' ? 'selected' : '' }}>Listo</option>
                            <option value="Recogido" {{ $pedido->estado == 'Recogido' ? 'selected' : '' }}>Recogido</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Volver</a>
                        <button type="submit" class="btn btn-warning text-dark">Actualizar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection