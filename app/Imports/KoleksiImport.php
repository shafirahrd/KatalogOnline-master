<?php

namespace App\Imports;

use App\Koleksi;
use Maatwebsite\Excel\Concerns\ToModel;

class KoleksiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        if($row[2] == '-'){
            $row[2] == NULL;
        }
        else{
            $row[2] = json_encode(explode(';', $row[2]));
        }
        // dd(json_decode($row['atribut_khusus']));
        return new Koleksi([
            'jenis_koleksi' => $row[0],
            'deskripsi_koleksi' => $row[1],
            'att_khusus' => $row[2],
        ]);
    }
}
