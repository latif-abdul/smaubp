<?php

namespace App\Imports;

use App\Models\Santris;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SiswaImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        // return new Santris()->where('no_pendaftaran', '=', $row[1])->update(['status_lulus' => true]);
        return new Santris([
            'no_pendaftaran' => $row[1],
            'nama_lengkap' => $row[2], 
            'status' => 0,
        ]);
    }
}
