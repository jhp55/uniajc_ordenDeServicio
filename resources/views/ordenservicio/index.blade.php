
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Órdenes de Servicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

    <div class="container my-5">

        <h1 class="mb-4">Órdenes de Servicio Registradas</h1>

        <a href="{{ route('ordenservicio.create') }}" class="btn btn-primary mb-3">
            Crear Nueva Orden
        </a>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Usuario</th>
                        <th>Código Orden</th>
                        <th>Descripción</th>
                        <th>Tipo Servicio</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Fecha Cierre Estimada</th>
                        <th>Fecha Creación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($OrdenDeServicio as $orden)
                    <tr>

                        <td>{{ $orden->id }}</td>

                        <td>
                            {{ $orden->cliente->nombre ?? 'Sin cliente' }}
                            {{ $orden->cliente->apellido ?? '' }}
                        </td>

                        <td>
                            {{ $orden->usuario->username ?? 'Sin usuario' }}
                        </td>

                        <td>{{ $orden->codigo_orden }}</td>

                        <td>{{ $orden->descripcion }}</td>

                        <td>{{ $orden->tipo_servicio }}</td>

                        <td>
                            <span class="badge
                                @if($orden->prioridad == 'Urgente')
                                    bg-danger
                                @elseif($orden->prioridad == 'Alta')
                                    bg-warning text-dark
                                @elseif($orden->prioridad == 'Media')
                                    bg-info text-dark
                                @else
                                    bg-secondary
                                @endif">
                                {{ $orden->prioridad }}
                            </span>
                        </td>

                        <td>
                            <span class="badge
                                @if($orden->estado == 'Cerrada')
                                    bg-success
                                @elseif($orden->estado == 'En Proceso')
                                    bg-primary
                                @elseif($orden->estado == 'Cancelada')
                                    bg-danger
                                @else
                                    bg-secondary
                                @endif">
                                {{ $orden->estado }}
                            </span>
                        </td>

                        <td>
                            {{ $orden->fecha_cierre_estimada
                                ? $orden->fecha_cierre_estimada->format('d/m/Y')
                                : 'No definida' }}
                        </td>

                        <td>
                            {{ $orden->created_at
                                ? $orden->created_at->format('d/m/Y')
                                : 'No disponible' }}
                        </td>

                        <td class="text-center">
                            <a href="{{ route('ordenservicio.edit', $orden->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="text-center">
                            No hay órdenes de servicio registradas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
