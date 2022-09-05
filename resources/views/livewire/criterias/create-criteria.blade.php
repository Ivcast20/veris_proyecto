<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="guardarCriterio">
                <div class="form-group">
                    <label>Proceso BIA</label>
                    <select wire:model="selectedBia" class="form-control">
                        <option value="" selected> -- Seleccione -- </option>
                        @foreach ($bia_processes as $bia)
                            <option value="{{ $bia->id }}">{{ $bia->nombre }}</option>
                        @endforeach
                    </select>
                    {{-- @error('selectedBia')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror --}}
                </div>
                @if ($selectedBia != '')
                    <div class="form-group">
                        {!! Form::label('parameter_id', 'Parámetro', []) !!}
                        <select name="parameter_id" wire:model="parameter_id" class="form-control">
                            <option value="" selected> -- Seleccione -- </option>
                            @foreach ($parameters as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        {{-- @error('parameter_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        {!! Form::label('level_id', 'Nivel', []) !!}
                        <select name="level_id" wire:model="level_id" class="form-control">
                            <option value="" selected> -- Seleccione -- </option>
                            @foreach ($levels as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        {{-- @error('level_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror --}}
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('criterio', 'Criterio', []) !!}
                    <textarea cols="30" rows="10" class="form-control" wire:model="criterio"></textarea>
                    {{-- @error('criterio')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror --}}
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="pt-2">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.criterias.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {{-- {!! Form::close() !!} --}}
            </form>
        </div>
    </div>
</div>
