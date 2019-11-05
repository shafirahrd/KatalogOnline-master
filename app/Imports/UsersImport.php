<?php

namespace App\Imports;

use App\Katalog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Katalog([
            'judul' => $row['judul'],
            'jenis' => $row['jenis'],
            'penerbit' => $row['penerbit'] == '-' ? NULL : $row['penerbit'],
            'kota_penerbit' => $row['kota_penerbit'] == '-' ? NULL : $row['kota_penerbit'],
            'tahun_terbit' => $row['tahun'] == '-' ? NULL : $row['tahun'],
            'bahasa' => $row['bahasa'] == '-' ? NULL : $row['bahasa'],
            'deskripsi' => $row['deskripsi'] == '-' ? NULL : $row['deskripsi'],
            'lokasi' => $row['lokasi'],
        ]);
    }
}
