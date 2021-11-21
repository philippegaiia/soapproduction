<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSubcategory;

class ProductSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_subcategories = [
            ['id' => '1','product_category_id' => '1','code' => '10','name' => 'Savons solides','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 05:56:32','updated_at' => '2021-01-24 06:20:20'],
            ['id' => '2','product_category_id' => '1','code' => '12','name' => 'Savons liquides','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:21:05','updated_at' => '2021-01-24 06:21:05'],
            ['id' => '3','product_category_id' => '9','code' => '14','name' => 'Savons ménagers solides','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:24:39','updated_at' => '2021-01-24 06:50:43'],
            ['id' => '4','product_category_id' => '9','code' => '22','name' => 'Savons ménagers liquide','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:25:12','updated_at' => '2021-01-24 06:37:38'],
            ['id' => '5','product_category_id' => '9','code' => '24','name' => 'Savons détachants solide','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:25:48','updated_at' => '2021-01-24 06:30:20'],
            ['id' => '6','product_category_id' => '2','code' => '30','name' => 'Baumes corporels','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:26:49','updated_at' => '2021-01-24 06:26:49'],
            ['id' => '7','product_category_id' => '2','code' => '32','name' => 'Baumes à lèvres','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:27:15','updated_at' => '2021-01-24 06:50:57'],
            ['id' => '8','product_category_id' => '2','code' => '34','name' => 'Baumes visage','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:28:39','updated_at' => '2021-01-24 06:28:39'],
            ['id' => '9','product_category_id' => '3','code' => '50','name' => 'Déodorants solides','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:29:20','updated_at' => '2021-01-24 06:29:20'],
            ['id' => '10','product_category_id' => '2','code' => '52','name' => 'Déodorants crème','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:29:59','updated_at' => '2021-01-24 06:29:59'],
            ['id' => '11','product_category_id' => '6','code' => '32','name' => 'Après-Shampoings','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:38:53','updated_at' => '2021-01-24 06:38:53'],
            ['id' => '12','product_category_id' => '7','code' => '60','name' => 'Shampoings solides','active' => '1','hs_code' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-24 06:39:28','updated_at' => '2021-01-24 06:39:28']
        ];

            foreach($product_subcategories as $product_subcategory){
                ProductSubcategory::updateOrCreate( ['id' => $product_subcategory['id']], $product_subcategory);
            }
    }
}
