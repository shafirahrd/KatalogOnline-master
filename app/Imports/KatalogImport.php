<?php

namespace App\Imports;

use DB;
use App\Katalog;
use App\Koleksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KatalogImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        $judul = DB::table('katalogs')->where('judul','=',$row['judul'])->first();

        if($judul == NULL){
            $koleksi = Koleksi::find($row['jenis']);
            $temp=[];

             // dd($koleksi);
            if(!is_null($koleksi)){
                if(!is_null($koleksi->att_khusus){
                    foreach ($koleksi->formatted_column as $value) {
                        $temp[$value] = $row[strtolower($value)] ?? '-';
                    }
                    $temp = json_encode($temp);
                }
                else{
                    $temp = NULL;
                }
            }

            return new Katalog([
                'judul' => $row['judul'],
                'jenis' => $row['jenis'],
                'penulis' => $row['penulis'] == '-' ? NULL : $row['penulis'],
                'penerbit' => $row['penerbit'] == '-' ? NULL : $row['penerbit'],
                'kota_penerbit' => $row['kota_penerbit'] == '-' ? NULL : $row['kota_penerbit'],
                'tahun_terbit' => $row['tahun'] == '-' ? NULL : $row['tahun'],
                'bahasa' => $row['bahasa'] == '-' ? NULL : $row['bahasa'],
                'deskripsi' => $row['deskripsi'] == '-' ? NULL : $row['deskripsi'],
                'lokasi' => $row['lokasi'],
                'att_value' => $temp,
            ]);
        }
    }
}
