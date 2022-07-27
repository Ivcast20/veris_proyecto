<div>
    <div class="d-flex justify-content-end">
        @livewire('create-rol')
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
                                    <td>{{ $rol->created_at }}</td>
                                    <td>{{ $rol->updated_at }}</td>
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
