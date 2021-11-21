<?php

namespace Database\Seeders;

use App\Models\Formula;
use Illuminate\Database\Seeder;

class FormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formulas = [
        ['id' => '1','code' => '001','ref_dip' => 'GA.001','name' => 'Savon très doux','start_date' => '2021-07-01','infos' => NULL,'active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 20:00:14','updated_at' => '2021-02-05 20:00:14'],
        ['id' => '2','code' => '010','ref_dip' => 'GA.010','name' => 'Savon l\'Enthousiaste','start_date' => '2019-07-01','infos' => NULL,'active' => '1','deleted_at' => NULL,'created_at' => '2021-02-07 20:45:33','updated_at' => '2021-02-07 20:45:33']
        ];

        foreach($formulas as $formula){
            Formula::updateOrCreate(['id' => $formula['id']], $formula);
        }

    }
}
