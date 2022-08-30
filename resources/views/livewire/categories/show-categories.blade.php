<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Nuevo</a>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            <div class="input-group  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Buscar" aria-label="Username"
                    aria-describedby="basic-addon1" wire:model.debounce.1000ms="search">
            </div>
            
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">Estado</span>
                </div>
                <select name="" id="" wire:model="tipo" class="form-control">
                    @foreach ($this->tipos_busqueda as $llave => $valor)
                        <option value="{{ $llave }}">{{ $valor }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if ($categorias->count())
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
                            @foreach ($categorias as $categoria)
                                <tr class="text-center">
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $categoria->updated_at->format('d/m/Y') }}</td>
                                    <td>{{ $categoria->estado == 0 ? 'Inactivo' : 'Activo' }}</td>
                                    <td>
                                        <a class="btn btn-info"
                                                href="{{ Route('admin.categories.edit', $categoria->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <b>Total: </b> {{ $categorias->count() }}
                <div class="pt-2">
                    {{ $categorias->links() }}
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <i class="fa fa-search fa-4x py-2"></i>
                    <div class="align-self-center">
                        No hay categorías registradas
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
