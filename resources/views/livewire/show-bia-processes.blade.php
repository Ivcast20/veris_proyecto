<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.biaprocesses.create') }}">Nuevo</a>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            <div class="input-group  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Buscar" aria-label="Username"
                    aria-describedby="basic-addon1" wire:model="search">
            </div>
            {{-- <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">Estado</span>
                </div>
                <select name="" id="" wire:model="tipo" class="form-control">
                    @foreach ($this->tipos_busqueda as $llave => $valor)
                        <option value="{{ $llave }}">{{ $valor }}</option>
                    @endforeach
                </select>
            </div> --}}
        </div>
        @if ($biaProcesses->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Nombre') }}</th>
                                <th style="width: 30%">{{ __('Alcance') }}</th>
                                <th>{{ __('Fecha de Inicio') }}</th>
                                <th>{{ __('Fecha de Fin') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($biaProcesses as $proceso)
                                <tr class="text-center">
                                    <td>{{ $proceso->id }}</td>
                                    <td>{{ $proceso->nombre }}</td>
                                    <td style="width: 30%">{{ $proceso->alcance }}</td>
                                    <td>{{ Carbon\Carbon::parse($proceso->fecha_inicio)->format('d-m-Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($proceso->fecha_fin)->format('d-m-Y') }}</td>
                                    <td>{{ $proceso->estado == 0 ? 'Inactivo' : 'Activo' }}</td>
                                    <td>
                                        <div class="btn-group-vertical">
                                            <a class="btn btn-info"
                                                href="{{ Route('admin.biaprocesses.edit', $proceso->id) }}">Editar</a>
                                            <button class="btn btn-danger"
                                                    wire:click="$emit('envioCalificar')">Calificar Productos</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <b>Total: </b>{{ $biaProcesses->count() }}
                <div class="pt-2">

                </div>
            </div>
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
        Livewire.on('envioCalificar', () => {
            Swal.fire({
                title: 'Confirmar envío correo',
                text: "¿Está seguro de enviar el correo para la calificacion de productos/servicios? Se deshabilitará el ingreso de: parámetros, niveles, criterios",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('show-bia-processes', 'envioCalificar');
                    Swal.fire(
                        'Correo Enviado!',
                        'Se ha enviado un correo a todos los usuarios que puedan calificar productos/servicios',
                        'success'
                    )
                }
            });
        });
    </script>
@endpush