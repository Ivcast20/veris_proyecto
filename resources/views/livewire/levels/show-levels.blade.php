<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.levels.create', $procesoBia) }}">Nuevo</a>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">BIA</span>
                </div>
                <select name="" id="" wire:model="procesoBia" class="form-control">
                    @foreach ($procesosBia as $proceso)
                        <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if ($levels->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Valor') }}</th>
                                <th>{{ __('Fecha de Creación') }}</th>
                                <th>{{ __('Fecha de Actualización') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $level)
                                <tr class="text-center">
                                    <td>{{ $level->id }}</td>
                                    <td>{{ $level->nombre }}</td>
                                    <td>{{ $level->valor }}</td>
                                    <td>{{ $level->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $level->updated_at->format('d/m/Y') }}</td>
                                    <td>{{ $level->estado == 0 ? 'Inactivo' : 'Activo' }}</td>
                                    <td>
                                        <a class="btn btn-info"
                                                href="{{ route('admin.levels.edit', $level->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <b>Total: </b>{{ $levels->count() }}
                <div class="pt-2">
                    {{ $levels->links() }}
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <i class="fa fa-search fa-4x py-2"></i>
                    <div class="align-self-center">
                        No hay niveles registradas
                    </div>
                </div>
            </div>
        @endif
    </div>
    
</div>
