<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            'Martillo' => 'https://imgaz3.staticbg.com/thumb/view/oaupload/ser1/banggood/images/CA/1F/e1114d7b-9723-4b37-84da-a2f27f53178f.jpg',
            'Loción Desmaquillante de Ojos Libre de Aceite' => 'https://bellezacheck.com/wp-content/uploads/0000009060114.jpg',
            'Coca-cola 2.5 L' => 'https://sevahacer.com/wp-content/uploads/2018/07/049000039689-600x600.png',
            'Gansito Marinela 50g' => 'https://bluggidelivery.com/file/2020/05/gansito.jpg',
            'Galletas Emperador piruetas' => 'https://www.superama.com.mx/Content/images/products/img_large/0750047801447L.jpg',
            'Sabritas Flamin hot' => 'https://abarrotesdonacuca.com/683-large_default/sabritas-flamin-hot-45g-sabritas.jpg',
            'Memoria USB Kingston' => 'https://virtualzone.mx/wp-content/uploads/2018/04/Memoria_Kingston_USB_SE9_8GB_Virtual_Zone_1.jpg',
            'MARINELA CHOCO ROLES 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            
        ];

        foreach($products as $name => $picture){
            DB::table('products')->insert([
                'bar_code' => rand(1000000000, 9000000000),
                'name' => $name,
                'description' => 'This is a pretty good description... ' . Str::random(40) ,
                'brand' => 'The brand '.Str::random(10),
                'qty' => rand(0, 99),
                'unit_of_measure' => 'ML',
                'content' => rand(0, 99),
                'price' => rand(500, 1000),
                'offer_price' => rand(300, 499),
                'offer_duration' => rand(4, 15),
                'delivery_cost' => rand(10, 100),
                'picture_1' => $picture,
            ]);
        }
    }
}
