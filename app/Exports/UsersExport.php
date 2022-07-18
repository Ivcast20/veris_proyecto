<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    public function headings(): array
    {
        if ($this->tipo == 0)
        {
            return [
                'ID',
                'Nombre',
                'Apellido',
                'Email',
                'Fecha de Creación',
            ];
        }else{
            return [
                'ID',
                'Nombre',
                'Apellido',
                'Email',
                'Fecha de Eliminación',
            ];
        }
        
    }

    public function map($user): array
    {
        if($this->tipo == 0)
        {
            return [
                $user->id,
                $user->name,
                $user->lastname,
                $user->email,
                $user->created_at,
            ];
        }else{
            return [
                $user->id,
                $user->name,
                $user->lastname,
                $user->email,
                $user->deleted_at,
            ];
        }
        
    }
    
    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): Collection
    {
        if($this->tipo == 0) {
            return User::all();
        } else {
            return User::onlyTrashed()->get();
        }
    }
}
