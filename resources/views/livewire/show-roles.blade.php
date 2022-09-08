<div>
    @can('admin.roles.create')
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('admin.roles.create') }}">Nuevo</a>
        </div>
    @endcan
    <div class="card mt-2">
        <div class="card-header">
            <div class="input-group  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Buscar" aria-label="Username"
                    aria-describedby="basic-addon1" wire:model.debounce.500ms="search">
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
        @if ($roles->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Fecha Creación') }}</th>
                                <th>{{ __('Fecha Actualización') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr class="text-center">
                                    <td>{{ $rol->id }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td>{{ $rol->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $rol->updated_at->format('d-m-Y') }}</td>
                                    @if (!$rol->deleted_at)
                                        <td>
                                            @can('admin.roles.edit')
                                                <a class="btn btn-info"
                                                    href="{{ Route('admin.roles.edit', $rol->id) }}">Editar</a>
                                            @endcan
                                            @can('admin.roles.destroy')
                                                <button class="btn btn-danger"
                                                    wire:click="$emit('deleteRol',{{ $rol->id }})">Eliminar</button>
                                            @endcan
                                        </td>
                                    @else
                                        <td>
                                            @can('admin.roles.destroy')
                                                <button class="btn btn-warning"
                                                    wire:click="$emit('restoreRol',{{ $rol->id }})">Restaurar</button>
                                            @endcan

                                        </td>
                                    @endif
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
                <b>Total: </b>{{ $roles->total() }}
                <div class="pt-2">
                    {{ $roles->links() }}
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

@push('js')
    <script>
        Livewire.on('deleteRol', (rolId) => {
            Swal.fire({
                title: 'Confirmar eliminación',
                text: "¿Está seguro de eliminar este rol?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('show-roles', 'delete', rolId);
                    Swal.fire(
                        'Eliminado!',
                        'El rol ha sido eliminado.',
                        'success'
                    )
                }
            });
        });

        Livewire.on('restoreRol', (rolId) => {
            Swal.fire({
                title: 'Confirmar restaurar',
                text: "¿Está seguro de restaurar este rol?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('show-roles', 'restore', rolId);
                    Swal.fire(
                        'Restaurado!',
                        'El rol ha sido restaurado.',
                        'success'
                    )
                }
            });
        });
    </script>
@endpush
