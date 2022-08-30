<div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.products.create') }}">Nuevo</a>
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
        @if ($productos->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Categoría') }}</th>
                                <th>{{ __('Fecha de Creación') }}</th>
                                <th>{{ __('Fecha de Actualización') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr class="text-center">
                                    <td>{{ $producto->id }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->category->nombre }}</td>
                                    <td>{{ $producto->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $producto->updated_at->format('d/m/Y') }}</td>
                                    <td>{{ $producto->estado == 0 ? 'Inactivo' : 'Activo' }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('admin.products.edit',$producto->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <b>Total: </b>{{ $productos->count() }}
                <div class="pt-2">
                    {{ $productos->links() }}
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
