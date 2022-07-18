<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.users.create') }}">Nuevo</a>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            {{-- <input type="text" class="form-control" wire:model="search" placeholder="Ingrese el nombre a buscar">
            <select name="" id="" wire:model="tipo">
                @foreach ($tipos_busqueda as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select> --}}
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

            <div class="d-flex justify-content-end my-2">
                <button wire:click="export('xlsx')" wire.loading.attr="disabled" class="btn btn-success">
                    EXCEL <i class="fa fa-file-excel"></i>
                </button>
                <button wire:click="export('pdf')" wire.loading.attr="disabled" class="btn btn-info ml-2">
                    PDF <i class="fa fa-file-pdf"></i>
                </button>
            </div>
        </div>
        @if ($users->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Apellido') }}</th>
                                <th>{{ __('Email') }}</th>
                                @if ($this->tipo == 0)
                                    <th>{{ __('Fecha Creación') }}</th>
                                    <th>{{ __('Fecha Actualización') }}</th>
                                    <th colspan="2">Acciones</th>
                                @else
                                    <th>{{ __('Fecha Eliminado') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($this->tipo == 0)
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ Route('admin.users.edit', $user->id) }}">Editar</a>
                                        </td>
                                        <td><button class="btn btn-danger"
                                                wire:click="$emit('deleteUser',{{ $user->id }})">Eliminar</button>
                                        </td>
                                    @else
                                        <td>{{ $user->deleted_at }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <b>Total: </b>{{ $users->total() }}
                <div class="pt-2">
                    {{ $users->links() }}
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
        Livewire.on('deleteUser', (userId) => {
            Swal.fire({
                title: 'Confirmar eliminación',
                text: "¿Está seguro de eliminar este usuario?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('show-users', 'delete', userId);
                    Swal.fire(
                        'Eliminado!',
                        'El usuario ha sido eliminado.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
