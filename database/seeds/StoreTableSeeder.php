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
    }
}
