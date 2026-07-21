<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaxBand;

class TaxBandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxBand::insert([
            [
                'from_amount' => 0,
                'to_amount'   => 24000,
                'rate'        => 10,
            ],
            [
                'from_amount' => 24000.01,
                'to_amount'   => 32333,
                'rate'        => 25,
            ],
            [
                'from_amount' => 32333.01,
                'to_amount'   => 500000,
                'rate'        => 30,
            ],
            [
                'from_amount' => 500000.01,
                'to_amount'   => 800000,
                'rate'        => 32.5,
            ],
            [
                'from_amount' => 800000.01,
                'to_amount'   => 999999999,
                'rate'        => 35,
            ],
        ]);
    }
}
