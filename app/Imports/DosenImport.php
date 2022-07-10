<?php

namespace App\Imports;

use App\Models\User;

use Maatwebsite\Excel\Concerns\ToModel;

class DosenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'prodi_id' => $row[2],
            'password' => bcrypt ($row[3]),
            'status' => $row[4],
             'role' => $row[5],
        ]);

      
    }
}
