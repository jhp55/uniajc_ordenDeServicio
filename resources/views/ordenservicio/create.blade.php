<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Orden de Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Crear Nueva Orden de Servicio</h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="{{ route('ordenservicio.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">Cliente:</label>
                                <select name="cliente_id" class="form-select" required>
                                    <option value="">Seleccione un cliente...</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Usuario (Responsable):</label>
                                <select name="usuario_id" class="form-select" required>
                                    <option value="">Seleccione un usuario...</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id_usuario }}">{{ $usuario->username }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Código de la Orden:</label>
                                <input type="text" name="codigo_orden" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Descripción:</label>
                                <textarea name="descripcion" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tipo de Servicio:</label>
                                <input type="text" name="tipo_servicio" class="form-control" placeholder="Ej: Instalación, Reparación..." required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Prioridad:</label>
                                <select name="prioridad" class="form-select" required>
                                    <option value="Baja">Baja</option>
                                    <option value="Media" selected>Media</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Urgente">Urgente</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('ordenservicio.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Guardar Orden</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>