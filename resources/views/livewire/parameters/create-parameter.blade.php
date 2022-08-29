<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="guardar">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre" wire:model="nombre">
                    @error('nombre')
                    <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proceso_bia">Proceso BIA</label>
                    <select wire:model="bia_process_id" class="form-control">
                        <option value="">-- Seleccione --</option>
                        @foreach ($procesos_bia as $proceso)
                            <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                        @endforeach
                    </select>
                    @error('bia_process_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-2">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.levels.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    <button type="submit" class='btn btn-primary'>Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
