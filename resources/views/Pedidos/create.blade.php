@extends('layouts.app')

@section('titulo', 'Registrar Pedido')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Registrar Nuevo Pedido</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre del Cliente *</label>
                        <input type="text" name="cliente" class="form-control" placeholder="Ej: Juan Pérez" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono *</label>
                        <input type="text" name="telefono" class="form-control" placeholder="Ej: 0987654321" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Servicio Solicitado *</label>
                        <select name="servicio" class="form-select" required>
                            <option value="">Seleccione un servicio...</option>
                            <option value="Lavado por Libras">Lavado por Libras</option>
                            <option value="Secado">Secado</option>
                            <option value="Tintorería">Tintorería</option>
                            <option value="Planchado">Planchado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad de Prendas *</label>
                        <input type="number" name="cantidad_prendas" class="form-control" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estado Inicial</label>
                        <select name="estado" class="form-select">
                            <option value="Recibido" selected>Recibido</option>
                            <option value="En Lavado">En Lavado</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a> <button type="submit" class="btn btn-primary">Guardar Pedido</button> </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const cliente = document.getElementsByName('cliente')[0].value.trim();
        const telefono = document.getElementsByName('telefono')[0].value.trim();
        const servicio = document.getElementsByName('servicio')[0].value;
        const cantidad = document.getElementsByName('cantidad_prendas')[0].value;

        if (cliente === "" || telefono === "" || servicio === "" || cantidad === "") {
            alert("Error: Todos los campos marcados con * son obligatorios.");
            e.preventDefault();
            return;
        }

        const nombreRegex = /^[a-zA-Z\s]+$/;
        if (!nombreRegex.test(cliente)) {
            alert("Error: El nombre del cliente no debe contener números ni caracteres especiales.");
            e.preventDefault();
            return;
        }

        if (isNaN(cantidad) || cantidad <= 0) {
            alert("Error: La cantidad de prendas debe ser un número válido mayor a 0.");
            e.preventDefault();
            return;
        }
    });
</script>

@endsection
