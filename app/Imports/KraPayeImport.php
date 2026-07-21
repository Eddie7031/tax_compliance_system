<?php

namespace App\Imports;

use App\Models\KraPayeRecord;
use Maatwebsite\Excel\Concerns\ToModel;

class KraPayeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KraPayeRecord([
            //
        ]);
    }
}
