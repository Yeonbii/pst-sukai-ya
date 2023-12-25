<?php

namespace App\Exports;

use App\Models\Responden;
use Maatwebsite\Excel\Concerns\FromCollection;

class RespondensExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Responden::all();
    }
}
