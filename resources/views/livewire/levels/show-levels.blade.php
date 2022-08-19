<div>
    <div class="input-group ">
        <div class="input-group-prepend">
            <span class="input-group-text">BIA</span>
        </div>
        <select name="" id="" wire:model="procesoBia" class="form-control">
            @foreach ($procesosBia as $proceso)
                <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        {{ $procesoBia }}
    </div>
</div>
