<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.users.create') }}">Nuevo</a>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            <input type="text" class="form-control" wire:model="search" placeholder="Ingrese el nombre a buscar">
        </div>
        @if ($users->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Fecha Creación') }}</th>
                                <th>{{ __('Fecha Actualización') }}</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ Route('admin.users.edit', $user->id) }}">Editar</a>
                                    </td>
                                    <td><button class="btn btn-danger"
                                            wire:click="$emit('deleteUser',{{ $user->id }})">Eliminar</button></td>
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
