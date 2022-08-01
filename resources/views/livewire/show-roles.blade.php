<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.roles.create') }}">Nuevo</a>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            <input type="text" class="form-control" wire:model="search" placeholder="Ingrese el nombre a buscar">
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
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $rol->id }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td>{{ $rol->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $rol->updated_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.roles.edit', $rol->id) }}">Editar</a>
                                    </td>
                                    <td><button class="btn btn-danger"
                                            wire:click="$emit('deleteRol',{{ $rol->id }})">Eliminar</button>
                                    </td>
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
            })
        })
    </script>
@endpush
