<?php

namespace App\Exports;

use App\Models\Daful;
use App\Models\Santris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DafulExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Santris::join('daful', 'daful.id_santris', '=', 'santris.id')->distinct()->get(['no_pendaftaran', 'nama_lengkap']);
    }

    public function headings(): array
    {
        return ["No Pendaftaran", "Nama"];
    }
}
