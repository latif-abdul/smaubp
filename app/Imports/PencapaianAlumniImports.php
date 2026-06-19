<?php

namespace App\Imports;

use App\Models\PencapaianAlumni;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PencapaianAlumniImports implements ToCollection, ToModel, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

    public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        return new PencapaianAlumni([
            'name' => $row[0],
            'universitas' => $row[1], 
            'prodi' => $row[2],
            'perolehan_hafalan' => $row[3],
        ]);
    }
}
