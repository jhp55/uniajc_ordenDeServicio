<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orden de Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-warning">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Actualizar Orden: <strong>{{ $orden->codigo_orden }}</strong></h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('ordenservicio.update', $orden->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Campos Bloqueados (No editables) -->
                            <div class="row bg-light p-3 rounded mb-4 border">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Cliente (No editable):</label>
                                    <select class="form-select" disabled>
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id_cliente }}" {{ $orden->cliente_id == $cliente->id_cliente ? 'selected' : '' }}>
                                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Usuario (No editable):</label>
                                    <select class="form-select" disabled>
                                        @foreach($usuarios as $usuario)
                                            <option value="{{ $usuario->id_usuario }}" {{ $orden->usuario_id == $usuario->id_usuario ? 'selected' : '' }}>
                                                {{ $usuario->username }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-muted">Código de la Orden (No editable):</label>
                                    <input type="text" class="form-control" value="{{ $orden->codigo_orden }}" readonly>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label text-muted">Descripción (No editable):</label>
                                    <textarea class="form-control" rows="2" readonly>{{ $orden->descripcion }}</textarea>
                                </div>
                            </div>
                            
                            <!-- Campos Editables -->
                            <h5 class="border-bottom pb-2 mb-3">Campos Editables</h5>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tipo de Servicio:</label>
                                <input type="text" name="tipo_servicio" class="form-control" value="{{ $orden->tipo_servicio }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Prioridad:</label>
                                    <select name="prioridad" class="form-select" required>
                                        <option value="Baja" {{ $orden->prioridad == 'Baja' ? 'selected' : '' }}>Baja</option>
                                        <option value="Media" {{ $orden->prioridad == 'Media' ? 'selected' : '' }}>Media</option>
                                        <option value="Alta" {{ $orden->prioridad == 'Alta' ? 'selected' : '' }}>Alta</option>
                                        <option value="Urgente" {{ $orden->prioridad == 'Urgente' ? 'selected' : '' }}>Urgente</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Estado:</label>
                                    <select name="estado" class="form-select" required>
                                        <option value="Pendiente" {{ $orden->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="En Proceso" {{ $orden->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                        <option value="Cerrada" {{ $orden->estado == 'Cerrada' ? 'selected' : '' }}>Cerrada</option>
                                        <option value="Cancelada" {{ $orden->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Fecha de Cierre Estimada:</label>
                                <input type="date" name="fecha_cierre_estimada" class="form-control" value="{{ $orden->fecha_cierre_estimada ? \Carbon\Carbon::parse($orden->fecha_cierre_estimada)->format('Y-m-d') : '' }}">
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('ordenservicio.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-warning">Actualizar Orden</button>
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