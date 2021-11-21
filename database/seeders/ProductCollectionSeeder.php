<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCollection;

class ProductCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_collections = [
            ['id' => '1','code' => 'GAO','name' => 'Gaiia Originals','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 06:44:24','updated_at' => '2021-01-24 06:58:02'],
            ['id' => '2','code' => 'MAR','name' => 'Marseilles','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 06:44:25','updated_at' => '2021-01-24 06:48:27'],
            ['id' => '3','code' => 'ALE','name' => 'Alep','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 06:45:01','updated_at' => '2021-01-24 06:45:01'],
            ['id' => '4','code' => 'GOA','name' => 'Goa','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 06:45:14','updated_at' => '2021-01-24 06:45:14'],
            ['id' => '5','code' => 'DOS','name' => 'Déo solides','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 06:47:00','updated_at' => '2021-01-24 06:47:00'],
            ['id' => '6','code' => 'BAV','name' => 'Baumes solides végans','active' => '1','deleted_at' => NULL,'created_at' => '2021-01-24 06:47:28','updated_at' => '2021-01-24 06:47:28']
        ];

        foreach($product_collections as $product_collection){
             ProductCollection::updateOrCreate( ['id' => $product_collection['id']], $product_collection);
        }
    }
}
