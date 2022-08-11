<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.levels.create') }}">Nuevo</a>
    </div>
    <div class="card mt-2">
        {{-- <div class="card-header">
            <div class="input-group  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Buscar" aria-label="Username"
                    aria-describedby="basic-addon1" wire:model="search">
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
        </div> --}}
        @if ($levels->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('name') }}</th>
                                <th>{{ __('value') }}</th>
                                <th>{{ __('created_at') }}</th>
                                <th>{{ __('updated_at') }}</th>
                                <th>{{ __('state') }}</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $level)
                                <tr class="text-center">
                                    <td>{{ $level->id }}</td>
                                    <td>{{ $level->name }}</td>
                                    <td>{{ $level->value }}</td>
                                    <td>{{ $level->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $level->updated_at->format('d-m-Y') }}</td>
                                    <td>{{ $level->deleted_at ? 'Inactivo' : 'Activo' }}</td>
                                    <td>
                                        <a href="{{ route('admin.levels.edit', $level->id) }}"
                                            class="btn btn-info">Editar</a>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                    {{-- <td>
                                        
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.roles.edit', $rol->id) }}">Editar</a>
                                        <button class="btn btn-danger"
                                            wire:click="$emit('deleteRol',{{ $rol->id }})">Eliminar</button>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <b>Total: </b>
                <div class="pt-2">

                </div>
            </div>
            {{-- <div class="card-footer">
                
            </div> --}}
        @else
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <i class="fa fa-search fa-4x py-2"></i>
                    <div class="align-self-center">
                        No se encontraron resultados
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
