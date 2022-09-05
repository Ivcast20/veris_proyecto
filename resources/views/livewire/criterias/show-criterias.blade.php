<div>
    @if ($levels->count())
        <div class="d-flex justify-content-end mb-2">
            <a class="btn btn-success" href="{{ route('admin.criterias.create') }}">Nuevo Criterio</a>
        </div>
        @foreach ($levels as $level)
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold">Nivel: </span>{{ $level->nombre }}
                </div>
                <div class="card-body">
                    @if ($level->parameters->count())
                        <table class="table">
                            <thead class="table-warning">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Parámetro
                                    </th>
                                    <th>
                                        Criterio
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($level->parameters as $parametro_con_criterio)
                                    <tr>
                                        <td>
                                            {{ $parametro_con_criterio->id }}
                                        </td>
                                        <td>
                                            {{ $parametro_con_criterio->nombre }}
                                        </td>
                                        <td>
                                            {{ $parametro_con_criterio->pivot->criterio }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>
                            (No existen criterios definidos)
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <i class="fa fa-search fa-4x py-2"></i>
                    <div class="align-self-center">
                        No hay Niveles para registrar criterios
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
