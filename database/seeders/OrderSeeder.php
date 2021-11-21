<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
        ['id' => '1','supplier_id' => '2','order_ref' => '1612545217','order_date' => '2021-01-21','delivery_date' => '2021-02-05','confirmation_no' => 'CC2021056','invoice_no' => NULL,'bl_no' => '2021075','amount' => '253573','freight' => '0','active' => '3','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-02-05 17:15:11','updated_at' => '2021-02-05 17:59:11'],
        ['id' => '2','supplier_id' => '1','order_ref' => 'CAU1612548231','order_date' => '2021-01-21','delivery_date' => '2021-01-28','confirmation_no' => '106427','invoice_no' => NULL,'bl_no' => NULL,'amount' => '208859','freight' => '9000','active' => '3','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-02-05 18:07:40','updated_at' => '2021-02-05 19:57:32']
        ];

    foreach ($orders as $order) {
        Order::updateOrCreate( ['id' => $order['id']], $order);
    }

    }
}
