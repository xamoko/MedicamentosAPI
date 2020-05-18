<?php

namespace App\Exports;

use App\medicamentosModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return medicamentosModel::all();
    }
}
