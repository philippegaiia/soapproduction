<?php

namespace Database\Seeders;

use App\Models\Supply;
use Illuminate\Database\Seeder;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplies = [
            ['id' => '2','order_id' => '1','listing_id' => '13','batch_no' => '155267','price' => '955','qty' => '1.00','expiry_date' => '2022-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 17:31:45','updated_at' => '2021-02-05 17:31:45'],
            ['id' => '4','order_id' => '1','listing_id' => '16','batch_no' => '155831','price' => '508','qty' => '1.00','expiry_date' => '2023-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 17:34:11','updated_at' => '2021-02-05 18:00:22'],
            ['id' => '5','order_id' => '1','listing_id' => '18','batch_no' => '154398','price' => '417','qty' => '2.00','expiry_date' => '2021-02-05','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 17:35:14','updated_at' => '2021-02-05 18:00:51'],
            ['id' => '6','order_id' => '1','listing_id' => '12','batch_no' => '154988','price' => '337','qty' => '1.00','expiry_date' => '2021-02-05','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 17:53:40','updated_at' => '2021-02-05 18:01:06'],
            ['id' => '7','order_id' => '1','listing_id' => '14','batch_no' => '155367','price' => '400','qty' => '5.00','expiry_date' => '2021-02-05','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 17:56:25','updated_at' => '2021-02-05 17:56:33'],
            ['id' => '8','order_id' => '2','listing_id' => '5','batch_no' => NULL,'price' => '267','qty' => '6.00','expiry_date' => '2021-02-05','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 18:11:03','updated_at' => '2021-02-05 18:11:09'],
            ['id' => '9','order_id' => '2','listing_id' => '6','batch_no' => NULL,'price' => '418','qty' => '4.00','expiry_date' => '2022-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 19:44:01','updated_at' => '2021-02-05 19:45:18'],
            ['id' => '10','order_id' => '2','listing_id' => '7','batch_no' => NULL,'price' => '1648','qty' => '1.00','expiry_date' => '2022-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 19:46:36','updated_at' => '2021-02-05 19:47:33'],
            ['id' => '11','order_id' => '2','listing_id' => '3','batch_no' => NULL,'price' => '695','qty' => '1.00','expiry_date' => '2022-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 19:47:14','updated_at' => '2021-02-05 19:47:14'],
            ['id' => '12','order_id' => '2','listing_id' => '1','batch_no' => NULL,'price' => '338','qty' => '3.00','expiry_date' => '2022-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 19:48:25','updated_at' => '2021-02-05 19:48:25'],
            ['id' => '13','order_id' => '2','listing_id' => '4','batch_no' => NULL,'price' => '463','qty' => '3.00','expiry_date' => '2022-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 19:49:48','updated_at' => '2021-02-05 19:49:48'],
            ['id' => '14','order_id' => '2','listing_id' => '19','batch_no' => NULL,'price' => '312','qty' => '5.00','expiry_date' => '2022-02-01','active' => '1','deleted_at' => NULL,'created_at' => '2021-02-05 19:54:00','updated_at' => '2021-02-05 19:54:00']
            ];


        foreach ($supplies as $supply) {
        Supply::updateOrCreate( ['id' => $supply['id']], $supply);
        }
    }
}
