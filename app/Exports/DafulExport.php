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
        return Santris::leftJoin('daful', 'daful.id_santris', '=', 'santris.id')
			->leftJoin('batch', 'santris.batch_id', '=', 'batch.id')
			->leftJoin('tahun_ajaran', 'batch.tahun_ajaran_id', '=', 'tahun_ajaran.id')
			->where('daful.id_santris', '!=', null)
			->where('santris.deleted_at', '=', null)
			->where('batch.deleted_at', '=', null)
			->where('tahun_ajaran.deleted_at', '=', null)
			->where('daful.deleted_at', '=', null)
            ->distinct()->get('santris.*')
            ->makeHidden(['created_at','updated_at', 'deleted_at', 'batch_id','sertifikat','id','foto','bukti_pembayaran','status']);
    }

    public function headings(): array
    {
        return ['Email','Nama Lengkap','Jenis Kelamin','Tempat Lahir','Tanggal Lahir',
            'Asal Sekolah','Tahun Lulus','Alamat Sekolah','Nama Ayah','Nama Ibu',
            'No HP Ayah','No HP Ibu','Pekerjaan Ayah','Pekerjaan Ibu',
            'Penghasilan Ayah','Penghasilan Ibu','Jalur Masuk',
            'No Pendaftaran','No Whatsapp','Status Lulus','NIK','NISN','Anak Ke-','Jumlah Saudara',
            'Tinggi Badan','Berat Badan','Nomor KK','Tempat Tanggal Lahir Ayah','NIK Ayah','Tempat Tanggal Lahir Ibu',
            'NIK Ibu','Alamat Orang Tua','Dusun','Desa','Kecamatan','Kabupaten Kota','Provinsi',
            'Alamat'];
    }
}
