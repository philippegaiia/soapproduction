<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
  ['id' => '1','ingredient_category_id' => '1','code' => 'OB1','name' => 'Huile d\'olive vierge','name_en' => 'Olive oil virgin','inci' => 'Olea europaea fruit oil','inci_naoh' => 'Sodium olivate','inci_koh' => 'Potassium olivate','cas' => '8001-25-00','cas_einecs' => '','einecs' => '232-277-00','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-27 08:55:50','updated_at' => '2020-12-27 08:55:50'],
  ['id' => '2','ingredient_category_id' => '1','code' => 'OB2','name' => 'Huile d\'olive raffinée','name_en' => 'Olive oil refined','inci' => 'Olea europaea fruit oil','inci_naoh' => 'Sodium olivate','inci_koh' => 'Potassium olivate','cas' => '8001-25-00','cas_einecs' => '','einecs' => '232-277-00','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-27 09:20:22','updated_at' => '2020-12-27 09:20:22'],
  ['id' => '3','ingredient_category_id' => '1','code' => 'OB3','name' => 'Huile de grignon d\'olive','name_en' => 'Olive pomace oil','inci' => 'Olea europaea oil','inci_naoh' => 'Sodium olivate','inci_koh' => 'Potassium olivate','cas' => '8001-25-00','cas_einecs' => NULL,'einecs' => '232-277-00','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-27 09:24:17','updated_at' => '2021-02-02 12:55:43'],
  ['id' => '4','ingredient_category_id' => '1','code' => 'OB4','name' => 'Huile de coco raffinée','name_en' => 'Coconut oil','inci' => 'Cocos nucifera oil','inci_naoh' => 'Sodium cocoate','inci_koh' => 'Potassium cocoate','cas' => '8001-31-08','cas_einecs' => NULL,'einecs' => '232-282-8','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-27 09:41:52','updated_at' => '2021-01-03 15:46:21'],
  ['id' => '5','ingredient_category_id' => '1','code' => 'OB5','name' => 'Huile de coco vierge','name_en' => 'Coconut oil virgin','inci' => 'Cocos nucifera oil','inci_naoh' => 'Sodium cocoate','inci_koh' => 'Potassium cocoate','cas' => '8001-31-08','cas_einecs' => '','einecs' => '232-282-8','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-27 12:33:37','updated_at' => '2020-12-27 12:33:37'],
  ['id' => '6','ingredient_category_id' => '1','code' => 'OB6','name' => 'Huile de tournesol oléique raffinée','name_en' => 'Sunflower oil high oleic','inci' => 'Helianthus annuus seed oil','inci_naoh' => 'Sodium sunflowerseedate','inci_koh' => 'Potassium sunflowerseedate','cas' => '8001-21-6','cas_einecs' => '','einecs' => '232-273-9','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-27 12:44:15','updated_at' => '2020-12-27 12:44:36'],
  ['id' => '7','ingredient_category_id' => '1','code' => 'OB7','name' => 'Huile de tournesol oléique vierge','name_en' => 'Sunflower oil high oleic virgin','inci' => 'Helianthus annuus seed oil','inci_naoh' => 'Sodium sunflowerseedate','inci_koh' => 'Potassium sunflowerseedate','cas' => '8001-21-6','cas_einecs' => '','einecs' => '232-273-9','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-27 12:48:01','updated_at' => '2020-12-27 12:48:01'],
  ['id' => '8','ingredient_category_id' => '1','code' => 'OB8','name' => 'Huile de ricin','name_en' => 'Castor oil','inci' => 'Ricinus communis oil','inci_naoh' => 'Sodium castorate','inci_koh' => 'Potassium castorate','cas' => '8001-79-4','cas_einecs' => '','einecs' => '232-293-8','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-28 04:54:37','updated_at' => '2020-12-28 04:54:37'],
  ['id' => '9','ingredient_category_id' => '1','code' => 'OB9','name' => 'Beurre de Karité','name_en' => 'Shea butter','inci' => 'Butyrospernum parkii butter','inci_naoh' => 'Sodium shea butterate','inci_koh' => 'Potassium shea butterate','cas' => '91080-23-8','cas_einecs' => '','einecs' => '293-515-7','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-28 09:54:07','updated_at' => '2020-12-28 09:54:07'],
  ['id' => '10','ingredient_category_id' => '1','code' => 'OB10','name' => 'Beurre de cacao  désodorisé','name_en' => 'Cocoa butter deodorized','inci' => 'Theobroma cacao seed butter','inci_naoh' => 'Sodium cocoa butterate','inci_koh' => 'Potassium cocoa butterate','cas' => '8002-31-1','cas_einecs' => NULL,'einecs' => '283-480-6','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-28 10:54:14','updated_at' => '2020-12-28 20:51:05'],
  ['id' => '11','ingredient_category_id' => '1','code' => 'OB11','name' => 'Beurre de cacao brut','name_en' => 'Cocoa butter raw','inci' => 'Theobroma cacao seed butter','inci_naoh' => 'Sodium cocoa butterate','inci_koh' => 'Potassium cocoa butterate','cas' => '8002-31-1','cas_einecs' => '','einecs' => '283-480-6','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-28 10:59:08','updated_at' => '2020-12-28 10:59:08'],
  ['id' => '12','ingredient_category_id' => '1','code' => 'OB12','name' => 'Huile de chanvre','name_en' => 'Hemp seed oil','inci' => 'Cannabis sativa seed oil','inci_naoh' => 'Sodium hempseedate','inci_koh' => 'Potassium hempseedate','cas' => '89958-21-4, 89958-21-4','cas_einecs' => '','einecs' => '289-644-3','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-28 11:10:54','updated_at' => '2020-12-28 11:10:54'],
  ['id' => '13','ingredient_category_id' => '2','code' => 'EO1','name' => 'Huile essentielle de lavande','name_en' => 'Lavender essential oil','inci' => 'Lavandula angustifolia oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8000-28-0','cas_einecs' => '90063-37-9','einecs' => '289-995-2','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-28 11:14:00','updated_at' => '2021-01-25 18:23:56'],
  ['id' => '14','ingredient_category_id' => '2','code' => 'EO2','name' => 'Huile essentielle de Lavandin super','name_en' => 'Lavendin super essential oil','inci' => 'Lavandula hybrida oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8000-27-9','cas_einecs' => '92201-55-3','einecs' => '295-985-9','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2020-12-28 11:42:58','updated_at' => '2020-12-28 11:53:37'],
  ['id' => '15','ingredient_category_id' => '1','code' => 'OB13','name' => 'Huile de noyau d\'abricot','name_en' => 'Apricot seed oil','inci' => 'Prunus armeniaca kernel oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-03 15:33:11','updated_at' => '2021-01-03 15:33:11'],
  ['id' => '16','ingredient_category_id' => '2','code' => 'EO3','name' => 'Huile essentielle d\'arbre à thé','name_en' => 'Tea tree oil','inci' => 'Melaleuca alternifolia leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '68647-73-4','cas_einecs' => '85085-48-9','einecs' => '285-377-1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-03 15:59:26','updated_at' => '2021-01-29 08:41:12'],
  ['id' => '17','ingredient_category_id' => '2','code' => 'EO4','name' => 'Huile essentielle d\'amyris','name_en' => 'Amyris essential oil','inci' => 'Amyris balsamifera bark oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8015-65-4','cas_einecs' => '90320-49-3','einecs' => '291-076-6','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-03 16:08:23','updated_at' => '2021-01-03 16:08:23'],
  ['id' => '18','ingredient_category_id' => '2','code' => 'EO5','name' => 'Huile essentielle de lemongrass','name_en' => 'Lemongras essential oil','inci' => 'Cymbopogon citratus leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8007-02-1','cas_einecs' => '89998-14-1','einecs' => '289-752-0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-03 16:12:29','updated_at' => '2021-01-03 16:12:29'],
  ['id' => '19','ingredient_category_id' => '2','code' => 'EO6','name' => 'Huile essentielle petitgrain bigaradier','name_en' => 'Petitgrain bigarade oil','inci' => 'Citrus aurantium amara leaf/twig oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '68916-04-1','cas_einecs' => '72968-50-4','einecs' => '277-143-2','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-03 16:18:49','updated_at' => '2021-01-03 16:18:49'],
  ['id' => '20','ingredient_category_id' => '2','code' => 'EO7','name' => 'Huile essentielle orange douce','name_en' => 'Orange essential oil','inci' => 'Citrus aurantium dulcis peel oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8008-57-9','cas_einecs' => '8028-48-6','einecs' => '232-433-8','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 10:20:18','updated_at' => '2021-01-25 14:47:09'],
  ['id' => '21','ingredient_category_id' => '2','code' => 'EO8','name' => 'Huile essentielle de bergamote','name_en' => 'Bergamot essential oil bergaptene free','inci' => 'Citrus aurantium bergamia peel oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8007-75-08','cas_einecs' => '89957','einecs' => NULL,'active' => '1','infos' => 'sans bergaptène','deleted_at' => NULL,'created_at' => '2021-01-25 10:59:20','updated_at' => '2021-01-29 11:57:30'],
  ['id' => '22','ingredient_category_id' => '2','code' => 'EO9','name' => 'Huile essentielle de baie de genévrier','name_en' => 'Juniper berry oil','inci' => 'Juniperus communis oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 14:44:00','updated_at' => '2021-01-25 14:44:00'],
  ['id' => '23','ingredient_category_id' => '2','code' => 'EO10','name' => 'Huile essentielle de menthe poivrée','name_en' => 'Peppermint oil','inci' => 'Mentha piperita oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8006-90-4','cas_einecs' => '84082-70-2','einecs' => '282-015-4','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 14:44:51','updated_at' => '2021-01-25 14:46:33'],
  ['id' => '24','ingredient_category_id' => '2','code' => 'EO11','name' => 'huile essentielle d\'Ylang Ylang','name_en' => 'Ylang Ylang essnetial oil','inci' => 'Cananga odorata flower oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8006-81-3','cas_einecs' => '83863-30-3','einecs' => '282-092-1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 14:51:06','updated_at' => '2021-01-25 14:51:06'],
  ['id' => '25','ingredient_category_id' => '2','code' => 'EO12','name' => 'Huile essentielle de poivre noir','name_en' => 'Black pepper oil','inci' => 'Piper nigrum fruit oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8006824','cas_einecs' => '84929419','einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 14:54:26','updated_at' => '2021-01-25 14:54:26'],
  ['id' => '26','ingredient_category_id' => '2','code' => 'EO13','name' => 'huile essentielle de vetiver','name_en' => 'Vetiver essential oil','inci' => 'Vetiveria zizanoides root oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8016-96-4','cas_einecs' => '282-490-8','einecs' => '84238-29-9','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 14:59:01','updated_at' => '2021-01-25 14:59:01'],
  ['id' => '27','ingredient_category_id' => '2','code' => 'EO14','name' => 'Huile essentielle de patchouli','name_en' => 'Paatchouli oil','inci' => 'Pogostemon cablin leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8014-09-3','cas_einecs' => '84238-39-1','einecs' => '282-493-4','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:01:19','updated_at' => '2021-01-25 15:01:19'],
  ['id' => '28','ingredient_category_id' => '2','code' => 'EO15','name' => 'Huile essentielle de cèdre de Virginie','name_en' => 'Cedarwood virginian essential oil','inci' => 'Juniperus virginiana wood oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8000-27-9','cas_einecs' => '85085-41-2','einecs' => '285-370-3','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:14:31','updated_at' => '2021-02-08 10:54:57'],
  ['id' => '29','ingredient_category_id' => '2','code' => 'EO16','name' => 'Huile essentielle cèdre de l\'Atlas','name_en' => 'Atlas cedarwood oil','inci' => 'Cedrus atlantica bark oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8000-27-9','cas_einecs' => '92201-55-3','einecs' => '295-985-9','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:17:08','updated_at' => '2021-01-27 09:43:17'],
  ['id' => '30','ingredient_category_id' => '2','code' => 'EO17','name' => 'Huile essentielle menthe viridis','name_en' => 'Spearmint essential oil','inci' => 'Mentha spicata herb oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8008-79-5','cas_einecs' => '84696-51-5','einecs' => '283-656-2','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:20:11','updated_at' => '2021-01-25 15:20:11'],
  ['id' => '31','ingredient_category_id' => '2','code' => 'EO19','name' => 'Huile essentielle menthe arvensis','name_en' => 'Cornmint essential oil','inci' => 'Mentha arvensis herb oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => '90063-97-1','einecs' => '290-058-5','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:24:37','updated_at' => '2021-01-25 15:27:38'],
  ['id' => '32','ingredient_category_id' => '2','code' => 'EO18','name' => 'huile essentielle de citron vert','name_en' => 'Lime essential oil','inci' => 'Citrus limon peel oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8008-56-8','cas_einecs' => '84929-31-7','einecs' => '284-515-8','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:27:07','updated_at' => '2021-01-25 15:27:07'],
  ['id' => '33','ingredient_category_id' => '2','code' => 'EO20','name' => 'Huile essentielle de bois de rose','name_en' => 'Rosewood essential oil','inci' => 'Aniba rosaeodora wood oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8015-77-8','cas_einecs' => '83863-32-5','einecs' => '281-093-7','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:41:57','updated_at' => '2021-01-25 15:41:57'],
  ['id' => '34','ingredient_category_id' => '2','code' => 'EO21','name' => 'Huile essentielle de gingembre','name_en' => 'Ginger essential oil','inci' => 'Zinziber officinale root oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8007-08-7','cas_einecs' => '84696-15-1','einecs' => '283-634-2','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:48:48','updated_at' => '2021-01-25 15:48:48'],
  ['id' => '35','ingredient_category_id' => '2','code' => 'EO22','name' => 'Huile essentielle de cannelle','name_en' => 'Cinnnamon leaf essential oil','inci' => 'Cinnamomun zeylanicum leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-25 15:53:06','updated_at' => '2021-01-25 15:53:06'],
  ['id' => '38','ingredient_category_id' => '8','code' => 'CH1','name' => 'Soude caustique','name_en' => 'Lye','inci' => 'Sodium hydroxide','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '1310-73-2','cas_einecs' => NULL,'einecs' => '215-185-5','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-26 12:35:39','updated_at' => '2021-01-26 12:35:39'],
  ['id' => '39','ingredient_category_id' => '2','code' => 'EO23','name' => 'Huile de cannelle rameaux feuillus Chine','name_en' => 'Cinnamon blume leaf/twig oil','inci' => 'Cinnamomum cassia leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8007-80-5','cas_einecs' => '84961-46-6','einecs' => '284-635-0','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-27 09:49:26','updated_at' => '2021-01-27 09:49:26'],
  ['id' => '40','ingredient_category_id' => '7','code' => 'CO1','name' => 'Bleu outremer 32','name_en' => 'Blue ultramarine No32','inci' => 'CI 77007','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '57455-37-5','cas_einecs' => '101357-30-6','einecs' => '309-928-3','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-28 13:25:43','updated_at' => '2021-01-28 13:25:43'],
  ['id' => '41','ingredient_category_id' => '3','code' => 'BE1','name' => 'Poudre de racines de curcuma','name_en' => 'Turmeric root powder','inci' => 'Curcuma longa root powder','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '84775-52-0','cas_einecs' => NULL,'einecs' => '283-882-1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-28 13:32:54','updated_at' => '2021-01-28 13:32:54'],
  ['id' => '42','ingredient_category_id' => '5','code' => 'EC1','name' => 'Ghassoul','name_en' => 'Ghassoul','inci' => 'Moroccan lava clay','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '12417-86-6','cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => 'Argile smectique','deleted_at' => NULL,'created_at' => '2021-01-28 13:58:22','updated_at' => '2021-01-28 13:58:22'],
  ['id' => '43','ingredient_category_id' => '1','code' => 'OB14','name' => 'Huile de baie de laurier','name_en' => 'Bay berry oil','inci' => 'Laurus nobilis fruit oil','inci_naoh' => 'Sodium laurelate','inci_koh' => 'Potassium laurelate','cas' => '8007-48-5','cas_einecs' => '84603-73-6','einecs' => '283-272-5','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-28 14:05:07','updated_at' => '2021-01-28 14:05:07'],
  ['id' => '44','ingredient_category_id' => '2','code' => 'EO24','name' => 'Huile essentielle de romarin cinéol','name_en' => 'Rosemary cineol essential oil','inci' => 'Rosmarinus officinalis leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8000-25-7','cas_einecs' => '84604-14-8','einecs' => '283-291-9','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-28 14:49:21','updated_at' => '2021-01-28 14:49:21'],
  ['id' => '45','ingredient_category_id' => '5','code' => 'EC2','name' => 'Ocre rouge','name_en' => 'Red ochre','inci' => 'CI R102','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-28 17:23:13','updated_at' => '2021-01-28 17:23:13'],
  ['id' => '46','ingredient_category_id' => '2','code' => 'EO25','name' => 'Huile essentielle de ravintsara linalool','name_en' => 'Ravintsara essential oil','inci' => 'Cinnamomum camphora leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => '91745-89-0','einecs' => '294-760-2','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-29 08:24:55','updated_at' => '2021-01-29 11:56:57'],
  ['id' => '47','ingredient_category_id' => '2','code' => 'EO26','name' => 'huile essentielle de ravintsara cineol','name_en' => 'Ravintsara essential oil','inci' => 'Cinnamomum camphora leaf oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => '92201-50-8','einecs' => '295-980-1','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-29 08:27:47','updated_at' => '2021-01-30 05:15:42'],
  ['id' => '49','ingredient_category_id' => '4','code' => 'FR1','name' => 'Linalool coeur','name_en' => 'Linalool Heart','inci' => 'Parfum','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-29 11:55:15','updated_at' => '2021-01-29 11:55:15'],
  ['id' => '50','ingredient_category_id' => '8','code' => 'CH2','name' => 'Eau','name_en' => 'Water','inci' => 'Aqua','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-01-29 14:45:58','updated_at' => '2021-01-29 14:45:58'],
  ['id' => '51','ingredient_category_id' => '7','code' => 'CO2','name' => 'Oxide de chrome','name_en' => 'Chromium oxide greens','inci' => 'CI 77288','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '1308-38-9','cas_einecs' => NULL,'einecs' => '215-160-9','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-02-01 10:51:55','updated_at' => '2021-02-01 10:54:03'],
  ['id' => '52','ingredient_category_id' => '2','code' => 'EO27','name' => 'Huile essentielle de pamplemousse blanc','name_en' => 'Grapefruit essentiel oil white','inci' => 'Citrus paradisi peel oil','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => '8016-20-4','cas_einecs' => '90045-43-5','einecs' => '289-904-6','active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-02-08 14:56:22','updated_at' => '2021-02-08 14:56:22'],
  ['id' => '53','ingredient_category_id' => '5','code' => 'EC3','name' => 'Ocre jaune','name_en' => 'Yellow ochre','inci' => 'CI Y83 ou CI 77015','inci_naoh' => NULL,'inci_koh' => NULL,'cas' => NULL,'cas_einecs' => NULL,'einecs' => NULL,'active' => '1','infos' => NULL,'deleted_at' => NULL,'created_at' => '2021-02-08 16:19:18','updated_at' => '2021-02-08 16:30:42']
];


            foreach ($ingredients as $ingredient) {
                Ingredient::updateOrCreate( ['id' => $ingredient['id']], $ingredient);
            }
    }
}
