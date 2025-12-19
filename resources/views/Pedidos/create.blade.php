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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pedidos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre del Cliente *</label>
                            <input type="text" name="cliente" class="form-control" value="{{ old('cliente') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono *</label>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
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
                            <input type="number" name="cantidad_prendas" class="form-control" min="1" value="{{ old('cantidad_prendas') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado Inicial</label>
                            <select name="estado" class="form-select">
                                <option value="Recibido" selected>Recibido</option>
                                <option value="En Lavado">En Lavado</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                        </div>
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
                alert("Error: El nombre del cliente no debe contener números.");
                e.preventDefault();
                return;
            }

            const telefonoRegex = /^[0-9]+$/;
            if (!telefonoRegex.test(telefono)) {
                alert("Error: El teléfono solo debe contener números.");
                e.preventDefault();
                return;
            }

            if (isNaN(cantidad) || cantidad <= 0) {
                alert("Error: La cantidad debe ser un número mayor a 0.");
                e.preventDefault();
                return;
            }
        });
    </script>
@endsection
