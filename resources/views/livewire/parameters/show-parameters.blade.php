<div>
    <div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="#">Nuevo</a>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">BIA</span>
                    </div>
                    <select name="" id="" wire:model="procesoBia" class="form-control">
                        @foreach ($procesosBia as $proceso)
                            <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Estado</span>
                    </div>
                    <select name="" id="" wire:model="estado" class="form-control">
                        @foreach ($this->tipos_busqueda as $llave => $valor)
                            <option value="{{ $llave }}">{{ $valor }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if ($parametros->count())
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr class="text-center">
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Nombre') }}</th>
                                    <th>{{ __('Fecha de Creación') }}</th>
                                    <th>{{ __('Fecha de Actualización') }}</th>
                                    <th>{{ __('Estado') }}</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parametros as $parametro)
                                    <tr class="text-center">
                                        <td>{{ $parametro->id }}</td>
                                        <td>{{ $parametro->nombre }}</td>
                                        <td>{{ $parametro->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $parametro->updated_at->format('d/m/Y') }}</td>
                                        <td>{{ $parametro->estado == 0 ? 'Inactivo' : 'Activo' }}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="#">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <b>Total: </b>{{ $parametros->count() }}
                    <div class="pt-2">
                        {{ $parametros->links() }}
                    </div>
                </div>
            @else
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <i class="fa fa-search fa-4x py-2"></i>
                        <div class="align-self-center">
                            No hay Parámetros registrados
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
