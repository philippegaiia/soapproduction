<?php

namespace Database\Seeders;

use App\Models\FormulaItem;
use Illuminate\Database\Seeder;

class FormulaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formula_items = [
            ['id' => '1','formula_id' => '1','ingredient_id' => '2','percentoils_dip' => '34.000','percentoils_real' => '34.000','percenttotal_dip' => '24.700','percenttotal_real' => '24.700','organic' => '1','phase' => '0','created_at' => '2021-02-05 20:00:50','updated_at' => '2021-02-07 17:52:52'],
            ['id' => '2','formula_id' => '1','ingredient_id' => '9','percentoils_dip' => '25.000','percentoils_real' => '25.000','percenttotal_dip' => '18.160','percenttotal_real' => '18.160','organic' => '1','phase' => '0','created_at' => '2021-02-05 20:01:09','updated_at' => '2021-02-07 18:01:16'],
            ['id' => '3','formula_id' => '1','ingredient_id' => '6','percentoils_dip' => '15.000','percentoils_real' => '15.000','percenttotal_dip' => '10.900','percenttotal_real' => '10.900','organic' => '1','phase' => '0','created_at' => '2021-02-07 17:53:53','updated_at' => '2021-02-07 17:53:53'],
            ['id' => '4','formula_id' => '1','ingredient_id' => '4','percentoils_dip' => '19.000','percentoils_real' => '19.000','percenttotal_dip' => '13.800','percenttotal_real' => '13.800','organic' => '1','phase' => '0','created_at' => '2021-02-07 17:54:25','updated_at' => '2021-02-07 17:54:25'],
            ['id' => '5','formula_id' => '1','ingredient_id' => '8','percentoils_dip' => '7.000','percentoils_real' => '7.000','percenttotal_dip' => '5.090','percenttotal_real' => '5.090','organic' => '1','phase' => '0','created_at' => '2021-02-07 17:54:46','updated_at' => '2021-02-07 17:54:46'],
            ['id' => '6','formula_id' => '1','ingredient_id' => '50','percentoils_dip' => '24.480','percentoils_real' => '24.480','percenttotal_dip' => '17.780','percenttotal_real' => '17.780','organic' => '0','phase' => '5','created_at' => '2021-02-07 17:55:16','updated_at' => '2021-02-07 17:59:10'],
            ['id' => '7','formula_id' => '1','ingredient_id' => '38','percentoils_dip' => '13.180','percentoils_real' => '13.180','percenttotal_dip' => '9.570','percenttotal_real' => '9.570','organic' => '0','phase' => '5','created_at' => '2021-02-07 17:58:05','updated_at' => '2021-02-07 17:58:05'],
            ['id' => '8','formula_id' => '2','ingredient_id' => '2','percentoils_dip' => '32.000','percentoils_real' => '32.000','percenttotal_dip' => '22.460','percenttotal_real' => '22.460','organic' => '1','phase' => '0','created_at' => '2021-02-07 20:48:53','updated_at' => '2021-02-07 20:48:53'],
            ['id' => '9','formula_id' => '2','ingredient_id' => '9','percentoils_dip' => '24.000','percentoils_real' => '24.000','percenttotal_dip' => '16.840','percenttotal_real' => '16.840','organic' => '1','phase' => '0','created_at' => '2021-02-07 20:49:20','updated_at' => '2021-02-07 20:49:20'],
            ['id' => '10','formula_id' => '2','ingredient_id' => '4','percentoils_dip' => '23.000','percentoils_real' => '23.000','percenttotal_dip' => '16.140','percenttotal_real' => '16.140','organic' => '1','phase' => '0','created_at' => '2021-02-07 20:49:45','updated_at' => '2021-02-07 20:49:45'],
            ['id' => '11','formula_id' => '2','ingredient_id' => '6','percentoils_dip' => '15.000','percentoils_real' => '15.000','percenttotal_dip' => '10.530','percenttotal_real' => '10.530','organic' => '1','phase' => '0','created_at' => '2021-02-07 20:50:50','updated_at' => '2021-02-07 20:50:50'],
            ['id' => '12','formula_id' => '2','ingredient_id' => '8','percentoils_dip' => '6.000','percentoils_real' => '6.000','percenttotal_dip' => '4.210','percenttotal_real' => '4.210','organic' => '1','phase' => '0','created_at' => '2021-02-07 20:51:06','updated_at' => '2021-02-07 20:51:06'],
            ['id' => '13','formula_id' => '2','ingredient_id' => '50','percentoils_dip' => '24.990','percentoils_real' => '24.990','percenttotal_dip' => '17.540','percenttotal_real' => '17.540','organic' => '1','phase' => '5','created_at' => '2021-02-07 20:51:45','updated_at' => '2021-02-07 20:51:52'],
            ['id' => '14','formula_id' => '2','ingredient_id' => '30','percentoils_dip' => '1.493','percentoils_real' => '1.493','percenttotal_dip' => '1.048','percenttotal_real' => '1.048','organic' => '0','phase' => '20','created_at' => '2021-02-07 20:54:30','updated_at' => '2021-02-07 20:55:40'],
            ['id' => '15','formula_id' => '2','ingredient_id' => '31','percentoils_dip' => '0.880','percentoils_real' => '0.880','percenttotal_dip' => '0.618','percenttotal_real' => '0.618','organic' => '1','phase' => '20','created_at' => '2021-02-07 20:55:18','updated_at' => '2021-02-07 20:56:10'],
            ['id' => '16','formula_id' => '2','ingredient_id' => '23','percentoils_dip' => '0.421','percentoils_real' => '0.421','percenttotal_dip' => '0.296','percenttotal_real' => '0.496','organic' => '1','phase' => '20','created_at' => '2021-02-07 20:56:50','updated_at' => '2021-02-07 20:56:50'],
            ['id' => '17','formula_id' => '2','ingredient_id' => '32','percentoils_dip' => '0.766','percentoils_real' => '0.766','percenttotal_dip' => '0.537','percenttotal_real' => '0.537','organic' => '1','phase' => '20','created_at' => '2021-02-07 20:57:27','updated_at' => '2021-02-07 20:57:27'],
            ['id' => '18','formula_id' => '2','ingredient_id' => '38','percentoils_dip' => '13.460','percentoils_real' => '13.460','percenttotal_dip' => '9.450','percenttotal_real' => '9.450','organic' => '0','phase' => '5','created_at' => '2021-02-07 20:58:15','updated_at' => '2021-02-07 20:58:15'],
            ['id' => '19','formula_id' => '2','ingredient_id' => '18','percentoils_dip' => '0.268','percentoils_real' => '0.268','percenttotal_dip' => '0.188','percenttotal_real' => '0.188','organic' => '1','phase' => '20','created_at' => '2021-02-07 20:59:59','updated_at' => '2021-02-07 20:59:59'],
            ['id' => '20','formula_id' => '2','ingredient_id' => '51','percentoils_dip' => '0.197','percentoils_real' => '0.197','percenttotal_dip' => '0.138','percenttotal_real' => '0.138','organic' => '0','phase' => '40','created_at' => '2021-02-07 21:00:54','updated_at' => '2021-02-07 21:00:54']
            ];

        foreach($formula_items as $item){
            FormulaItem::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
