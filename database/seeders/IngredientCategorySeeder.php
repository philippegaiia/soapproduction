<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IngredientCategory;

class IngredientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredient_categories = [
            ['id' => '1','code' => 'OB','name' => 'Huiles et beurres','name_en' => 'Oils and butters','deleted_at' => NULL,'created_at' => '2020-12-27 06:33:00','updated_at' => '2020-12-27 07:08:45'],
            ['id' => '2','code' => 'EO','name' => 'Huiles essentielles','name_en' => 'Essential oils','deleted_at' => NULL,'created_at' => '2020-12-27 06:34:04','updated_at' => '2020-12-27 07:21:55'],
            ['id' => '3','code' => 'BE','name' => 'Extraits végétaux','name_en' => 'Botanical extracts','deleted_at' => NULL,'created_at' => '2020-12-27 06:34:59','updated_at' => '2020-12-27 07:42:23'],
            ['id' => '4','code' => 'FR','name' => 'Parfums et arômes','name_en' => 'Fragrances','deleted_at' => NULL,'created_at' => '2020-12-27 06:35:31','updated_at' => '2020-12-27 07:28:12'],
            ['id' => '5','code' => 'EC','name' => 'Terres et argiles','name_en' => 'Earth and clays','deleted_at' => NULL,'created_at' => '2020-12-27 06:37:01','updated_at' => '2020-12-27 07:45:27'],
            ['id' => '6','code' => 'FA','name' => 'Acides gras','name_en' => 'Fatty acids','deleted_at' => NULL,'created_at' => '2020-12-27 06:44:40','updated_at' => '2020-12-27 07:21:21'],
            ['id' => '7','code' => 'CO','name' => 'Colorants','name_en' => 'Colors','deleted_at' => NULL,'created_at' => '2020-12-27 06:51:24','updated_at' => '2020-12-27 07:46:26'],
            ['id' => '8','code' => 'CH','name' => 'Produits chimiques auxiliaires','name_en' => 'Chemicals','deleted_at' => NULL,'created_at' => '2020-12-27 06:52:06','updated_at' => '2020-12-27 07:46:41'],
            ['id' => '9','code' => 'PK','name' => 'Emballage','name_en' => 'Packing','deleted_at' => NULL,'created_at' => '2020-12-27 06:52:45','updated_at' => '2020-12-27 07:45:58'],
            ['id' => '10','code' => 'WA','name' => 'Cires','name_en' => 'Waxes','deleted_at' => NULL,'created_at' => '2020-12-27 07:02:49','updated_at' => '2020-12-27 07:36:03'],
            ['id' => '11','code' => 'GY','name' => 'Glycols','name_en' => 'Glycols','deleted_at' => NULL,'created_at' => '2020-12-27 08:30:10','updated_at' => '2020-12-27 08:30:10'],
            ];

            foreach ($ingredient_categories as $ingredient_category) {
                IngredientCategory::updateOrCreate( ['id' => $ingredient_category['id']], $ingredient_category);
            }
    }
}
