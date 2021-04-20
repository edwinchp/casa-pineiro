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
            'Cigarro unidad' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Soldado chocolate ee ROLES ee' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Cigarro paquete' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Cigarro Benson' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Cigarro Malboro' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Cigarro Camel' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Cigarro económico' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Pepse' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'MARINELA CHOCO ROLES 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Chocolatines' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Emperador Piruetas grandes' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Suavicremas' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'CocaCola' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Café Dolca ' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Media crema 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Clavos 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Salsa botanera 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Crema peinar 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Cepillo dientes 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Pasta dientes 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Pepsi 500ml' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Kola loca' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Tijera' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Vuala chocolate' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Cubrebocas' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Aceite 123' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Aceite menem' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Chiles jalapeños' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Pinguinos' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Rancheritos' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            'Jamón' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            
        ];

        foreach($products as $name => $picture){
            DB::table('products')->insert([
                'bar_code' => rand(1000000000, 9000000000),
                'name' => $name,
                'description' => 'This is a pretty good description... ' . Str::random(40) ,
                'brand' => 'The brand '.Str::random(10),
                'cp_qty' => rand(0, 99),
                'te_qty' => rand(0, 99),
                'cp_price' => rand(10, 250),
                'te_price' => rand(500, 1000),
                'cp_offer_price' => rand(300, 499),
                'cp_offer_duration' => rand(4, 15),
                'delivery_cost' => rand(10, 100),
                'editing' => false
                //'picture_1' => $picture,
            ]);
        }
    }
}
