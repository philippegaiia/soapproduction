<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_categories = [
            ['id' => '1','code' => '10','name' => 'Savons cosmétiques','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:44:21','updated_at' => '2021-01-24 06:07:06'],
            ['id' => '2','code' => '20','name' => 'Soins de la peau','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:46:10','updated_at' => '2021-01-24 05:46:10'],
            ['id' => '3','code' => '30','name' => 'Déodorants','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:46:25','updated_at' => '2021-01-24 05:46:25'],
            ['id' => '4','code' => '40','name' => 'Accessoires hygiène','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:46:46','updated_at' => '2021-01-24 05:46:46'],
            ['id' => '5','code' => '50','name' => 'Accessoires savonnerie','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:47:09','updated_at' => '2021-01-24 05:47:09'],
            ['id' => '6','code' => '60','name' => 'Soins capillaires','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:53:04','updated_at' => '2021-01-24 06:34:15'],
            ['id' => '7','code' => '70','name' => 'Shampoings','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:53:53','updated_at' => '2021-01-24 06:36:06'],
            ['id' => '8','code' => '99','name' => 'Autres','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:54:06','updated_at' => '2021-01-24 06:35:10'],
            ['id' => '9','code' => '15','name' => 'Savons ménagers','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 05:59:19','updated_at' => '2021-01-24 05:59:19'],
            ['id' => '10','code' => '80','name' => 'Arompathérapie','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 06:36:50','updated_at' => '2021-01-24 06:36:50']
        ];

        foreach ($product_categories as $product_category) {
                ProductCategory::updateOrCreate( ['id' => $product_category['id']], $product_category);
             }
    }
}
