<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            ['name' => 'Tendejón Evelyn'],
            ['name' => 'Ferretería Cables'],
            ['name' => 'Dunosusa'],
            ['name' => 'Los Arcos'],
            ['name' => 'Pajaritos'],
            ['name' => 'Aurrerá'],
            ['name' => 'El Sagrado Corazón de Jesús'],
            ['name' => 'Los Huevos'],
            ['name' => 'El Detallista'],
            ['name' => 'El Detallista II'],
            ['name' => 'El Chumín'],
        ];

        foreach ($stores as $store) {
            DB::table('stores')->insert(
                [
                    'name' => $store['name']
                ]
            );
        }

        for($i = 1; $i < 4; $i++){
            DB::table('store_user')->insert([
                'store_id' => $i,
                'user_id' => 1
            ]);
        }

        for($i = 3; $i < 6; $i++){
            DB::table('store_user')->insert([
                'store_id' => $i,
                'user_id' => 2
            ]);
        }
    }
}
