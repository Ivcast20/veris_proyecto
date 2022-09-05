<div>
    <div class="card">
        <div class="card-body">
            {!! Form::model('criteria', ['route' => ['admin.criterias.store'], 'method' => 'POST']) !!}
            {{-- {!! Form::select('bia_process_id', $bia_processes, null, ['class' => 'form-control', wire:model=""]) !!} --}}
            <div class="form-group">
                <label for="bia_process_id">Proceso BIA</label>
                <select name="bia_process_id" wire:model="selectedBia" class="form-control">
                    <option value="" selected> -- Seleccione -- </option>
                    @foreach ($bia_processes as $bia)
                        <option value="{{ $bia->id }}">{{ $bia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @if ($selectedBia != "")
            <div class="form-group">
                {!! Form::label('parameter_id', 'Parámetro', []) !!}
                {!! Form::select('parameter_id', $levels, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('level_id', 'Nivel', []) !!}
                {!! Form::select('level_id', $parameters, null, ['class' => 'form-control']) !!}
            </div>
            @endif
            <div class="form-group">
                {!! Form::label('criterio', 'Criterio', []) !!}
                {!! Form::textarea('criterio', null, ['class' => 'form-control']) !!}
            </div>
            <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.criterias.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
