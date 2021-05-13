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

        //['name' => 'Clavos', 'store_id' => 1, 'picture_1' => ''],

        $products = [
            // Abarrotes
            ['name' => 'Leche Entera, Leche Santa Clara', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/41Dlbmc5Y9L._AC_SX184_.jpg'],
            ['name' => 'Coca-Cola Original, 24 Pack - 235 ml/lata', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/51b3+k2zINL._AC_SX184_.jpg'],
            ['name' => 'Nescafé Clasico, Café Soluble, 225 g', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/41PY5FjhelS._AC_SX184_.jpg'],
            ['name' => 'Quaker Avena Old Fashion, Sabor Natural, 1190 g ', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/418QISuXSEL.jpg'],
            ['name' => 'Herdez Granos de Elote, 400 gr ', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/51zKwYgzPlL.jpg'],
            ['name' => 'El Dorado, Atun El Dorado Agua, 140 gramos ', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/510hTqSm-2L.jpg'],
            ['name' => 'Clemente Jacques, Mermelada Clemente Jacques Fresa, 470 gramos', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/41tNOTPhJrL.jpg'],
            ['name' => '1-2-3 Aceite Vegetal,1 Lt', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/710R7+31g5L._AC_UL160_SR160,160_.jpg'],
            ['name' => 'Barilla, Pasta Fusilli, 500 gramos', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/81Bxw31mzBL._AC_UL160_SR160,160_.jpg'],
            ['name' => 'Nutrileche Producto Lácteo, 1 litro. Paquete de 12', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/61ssPqzR0mL._AC_UL160_SR160,160_.jpg'],
            ['name' => 'Genérico Cereal Corn Flakes Kelloggs Zucaritas - 860 g', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/71cPcDSQ8hL._AC_UL160_SR160,160_.jpg'],
            ['name' => 'Clemente Jacques, Salsa Catsup, 680 gramos', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/41eDadF3yAL.jpg'],
            ['name' => 'Epura, Agua Natural sin Sodio en Bidón de PET', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/41SpxMRflDL._AC_SX184_.jpg'],
            ['name' => ' Cerveza Clara, Modelo Especial, 12 botellas de 355 ml c/u ', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/71djafUhffS._AC_SL1000_.jpg'],
            ['name' => ' Cerveza Dos Equis Lager 24 Latas de 355ml ', 'store_id' => 1, 'picture_1' => 'https://images-na.ssl-images-amazon.com/images/I/51J-0s0cv1L._AC_.jpg'],

            // Ferretería
            ['name' => 'Martillo', 'store_id' => 2, 'picture_1' => 'https://imgaz3.staticbg.com/thumb/view/oaupload/ser1/banggood/images/CA/1F/e1114d7b-9723-4b37-84da-a2f27f53178f.jpg'],
            ['name' => 'Hidrolavadora', 'store_id' => 2, 'picture_1' => 'https://http2.mlstatic.com/D_NQ_NP_778470-MLA42937518972_072020-W.webp'],
            ['name' => 'Clavos', 'store_id' => 2, 'picture_1' => 'https://media.istockphoto.com/photos/un-solo-clavo-picture-id145161069?s=612x612'],
            ['name' => '3M Temflex Cinta aislante de vinil, 1600, 18.4 mm x 18 m', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/61hRzr0NR2L._AC_UL320_.jpg'],
            ['name' => 'Ravinte - Juego de 40 pomos para armarios de cocina, pomos de cajón de níquel satinado y zinc', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/71durd8L3sL._AC_UL320_.jpg'],
            ['name' => 'Yinpecly M8 x 75 mm acero al carbono grado 8.8 tornillos de cabeza hexagonal externo rosca métrica tornillos hexagonales', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/51FHYaUSdbL._AC_UL320_.jpg'],
            ['name' => 'Rotomartillo 1/2", profesional, 700 W, 5A', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/61ZC9H0uMJL._AC_UL320_.jpg'],
            ['name' => 'Reflector LED de Exterior, color Luz blanca Tecnolite LQ-LED/001/65', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/61lJ64DaXuL._AC_UL320_.jpg'],
            ['name' => 'Yinpecly Bisagras de resorte de doble acción de 12,7 cm de acero inoxidable', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/51Ytd5i8eKL._AC_UL320_.jpg'],
            ['name' => 'Ganchos para panel de pared de listones', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/71XuUISnNGL._AC_UL320_.jpg'],
            ['name' => '50 tornillos hexagonales de cabeza redonda M3-0,5 x 30 mm, aleación de acero de grado 10,9', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/71pn+L0iB0L._AC_UL320_.jpg'],
            ['name' => 'Hermex Basic BAL-LB-RP, Cerradura de pomo tipo esfera para recámara', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/81uMhK4pXJL._AC_UL320_.jpg'],
            ['name' => 'Fiero PIJ-838, Pijas multiusos 8 x 1-1/2", bolsa con 100 piezas', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/6120eyyopZL._AC_UL320_.jpg'],
            ['name' => 'Truper BOT-26J, Botas jardineras antiderrapantes, # 26', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/81FTeVVQgLL._AC_UL320_.jpg'],
            ['name' => 'Pretul LL-21P, Llave de esfera, de zamac 1/2", 110 g', 'store_id' => 2, 'picture_1' => 'https://m.media-amazon.com/images/I/71kD8ytXFKL._AC_UL320_.jpg'],
            // 'Loción Desmaquillante de Ojos Libre de Aceite' => 'https://bellezacheck.com/wp-content/uploads/0000009060114.jpg',
            // 'Coca-cola 2.5 L' => 'https://sevahacer.com/wp-content/uploads/2018/07/049000039689-600x600.png',
            // 'Gansito Marinela 50g' => 'https://bluggidelivery.com/file/2020/05/gansito.jpg',
            // 'Galletas Emperador piruetas' => 'https://www.superama.com.mx/Content/images/products/img_large/0750047801447L.jpg',
            // 'Sabritas Flamin hot' => 'https://abarrotesdonacuca.com/683-large_default/sabritas-flamin-hot-45g-sabritas.jpg',
            // 'Memoria USB Kingston' => 'https://virtualzone.mx/wp-content/uploads/2018/04/Memoria_Kingston_USB_SE9_8GB_Virtual_Zone_1.jpg',
            // 'Cigarro unidad' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Soldado chocolate ee ROLES ee' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Cigarro paquete' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Cigarro Benson' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Cigarro Malboro' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Cigarro Camel' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Cigarro económico' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Pepse' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'MARINELA CHOCO ROLES 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Chocolatines' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Emperador Piruetas grandes' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Suavicremas' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'CocaCola' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Café Dolca ' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Media crema 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Clavos 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Salsa botanera 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Crema peinar 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Cepillo dientes 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Pasta dientes 67GR' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Pepsi 500ml' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Kola loca' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Tijera' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Vuala chocolate' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Cubrebocas' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Aceite 123' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Aceite menem' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Chiles jalapeños' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Pinguinos' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Rancheritos' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',
            // 'Jamón' => 'https://tuabarrote.com/3300-large_default/marinela-choco-roles-67gr.jpg',

        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'bar_code' => rand(1000000000, 9000000000),
                'name' => $product['name'],
                'description' => 'This is a pretty good description... ' . Str::random(40),
                'brand' => 'The brand ' . Str::random(10),
                'cp_qty' => rand(0, 99),
                'te_qty' => rand(0, 99),
                'cp_price' => rand(10, 50),
                'te_price' => rand(500, 1000),
                'cp_offer_price' => rand(300, 499),
                'cp_offer_duration' => rand(4, 15),
                'delivery_cost' => rand(10, 100),
                'editing' => false,
                'picture_1' => $product['picture_1'],
                'store_id' => $product['store_id']
            ]);
        }
    }
}
