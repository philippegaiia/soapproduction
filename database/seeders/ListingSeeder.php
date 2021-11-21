<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listings = [
            ['id' => '1','ingredient_id' => '4','supplier_id' => '1','code' => NULL,'supplier_ref' => '600321','name' => 'Seau huile de noix de coco bio désodorisée','pkg' => '2','unit_weight' => '25.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:21:26','updated_at' => '2021-01-17 21:24:47'],
            ['id' => '2','ingredient_id' => '6','supplier_id' => '1','code' => NULL,'supplier_ref' => '10834','name' => 'Huile de tournesol hautement oléique bio désodorisée','pkg' => '1','unit_weight' => '18.400','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:26:20','updated_at' => '2021-01-17 21:26:20'],
            ['id' => '3','ingredient_id' => '8','supplier_id' => '1','code' => NULL,'supplier_ref' => '10188','name' => 'Huile vierge de ricin bio','pkg' => '1','unit_weight' => '30.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:28:38','updated_at' => '2021-01-17 21:28:38'],
            ['id' => '4','ingredient_id' => '9','supplier_id' => '1','code' => NULL,'supplier_ref' => '600420','name' => 'Beurre de karité bio désodorisé','pkg' => '3','unit_weight' => '25.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:29:43','updated_at' => '2021-01-17 21:45:10'],
            ['id' => '5','ingredient_id' => '6','supplier_id' => '1','code' => NULL,'supplier_ref' => '10820','name' => 'Huile de tournesol hautement oléique raffinée','pkg' => '1','unit_weight' => '18.400','organic' => '0','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:32:36','updated_at' => '2021-01-17 21:32:36'],
            ['id' => '6','ingredient_id' => '1','supplier_id' => '1','code' => NULL,'supplier_ref' => '8320','name' => 'Huile d\'olive vierge extra bio - origine Espagne','pkg' => '1','unit_weight' => '18.320','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:41:01','updated_at' => '2021-01-17 21:41:08'],
            ['id' => '7','ingredient_id' => '12','supplier_id' => '1','code' => NULL,'supplier_ref' => '10725','name' => 'Huile de chanvre bio, Origine France','pkg' => '1','unit_weight' => '18.320','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:42:44','updated_at' => '2021-01-17 21:42:44'],
            ['id' => '8','ingredient_id' => '1','supplier_id' => '1','code' => NULL,'supplier_ref' => '8321','name' => 'Huile d\'olive vierge extra bio - origine Tunisie','pkg' => '1','unit_weight' => '18.320','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:48:31','updated_at' => '2021-01-17 21:48:31'],
            ['id' => '9','ingredient_id' => '2','supplier_id' => '1','code' => NULL,'supplier_ref' => '8317','name' => 'Huile d\'olive vierge extra bio - origine Tunisie','pkg' => '1','unit_weight' => '201.520','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 21:53:29','updated_at' => '2021-01-17 21:53:29'],
            ['id' => '10','ingredient_id' => '2','supplier_id' => '1','code' => NULL,'supplier_ref' => '3336590070206','name' => 'Huile d\'olive vierge extra - origine Union Européenne','pkg' => '1','unit_weight' => '18.320','organic' => '0','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:00:30','updated_at' => '2021-01-17 22:00:38'],
            ['id' => '11','ingredient_id' => '3','supplier_id' => '1','code' => NULL,'supplier_ref' => '10762','name' => 'Huile grignon d\'olive raffinée, Origine Union Européenne','pkg' => '1','unit_weight' => '18.320','organic' => '0','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:01:38','updated_at' => '2021-01-17 22:01:38'],
            ['id' => '12','ingredient_id' => '4','supplier_id' => '2','code' => NULL,'supplier_ref' => 'COCOBDFT','name' => 'Huile de noix de coco biologique raffinée','pkg' => '4','unit_weight' => '180.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:04:41','updated_at' => '2021-01-17 22:04:41'],
            ['id' => '13','ingredient_id' => '10','supplier_id' => '2','code' => NULL,'supplier_ref' => 'CACABDC3','name' => 'Beurre de cacao biologique désodorisé','pkg' => '3','unit_weight' => '25.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:06:35','updated_at' => '2021-01-17 22:06:35'],
            ['id' => '14','ingredient_id' => '9','supplier_id' => '2','code' => NULL,'supplier_ref' => 'KARIBDC3','name' => 'Beuure de karité biologique raffiné','pkg' => '3','unit_weight' => '25.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:07:46','updated_at' => '2021-01-17 22:07:46'],
            ['id' => '15','ingredient_id' => '1','supplier_id' => '2','code' => NULL,'supplier_ref' => 'OLIVBIFT','name' => 'Huile d\'olive vierge extra biologique','pkg' => '4','unit_weight' => '190.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:09:20','updated_at' => '2021-01-17 22:09:20'],
            ['id' => '16','ingredient_id' => '2','supplier_id' => '2','code' => NULL,'supplier_ref' => 'OLIVBDFT','name' => 'huile d\'olive biologique raffinée','pkg' => '4','unit_weight' => '190.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:13:03','updated_at' => '2021-01-17 22:13:03'],
            ['id' => '17','ingredient_id' => '6','supplier_id' => '2','code' => NULL,'supplier_ref' => 'TOUROBRF','name' => 'huile de tournesol oléique biologique raffinée','pkg' => '4','unit_weight' => '180.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:14:29','updated_at' => '2021-01-17 22:14:29'],
            ['id' => '18','ingredient_id' => '8','supplier_id' => '2','code' => NULL,'supplier_ref' => 'RICIBIB1','name' => 'Huile de ricin biologique vierge','pkg' => '1','unit_weight' => '27.000','organic' => '1','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-17 22:15:46','updated_at' => '2021-01-17 22:17:10'],
            ['id' => '19','ingredient_id' => '2','supplier_id' => '1','code' => '123','supplier_ref' => '14500','name' => 'Huile d\'olive raffinée, UE','pkg' => '1','unit_weight' => '18.320','organic' => '0','fairtrade' => '0','cosmos' => '0','cosmecert' => '0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-02-07 22:47:35','updated_at' => '2021-02-07 22:47:35']
            ];

            foreach ($listings as $listing) {
                Listing::updateOrCreate( ['id' => $listing['id']], $listing);
             }
    }
}
