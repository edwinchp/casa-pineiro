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
            ['name' => 'Ferretería Cables'],
            ['name' => 'Tendejón Evelyn'],
            ['name' => 'Mary Kay'],
        ];

        // Create stores
        foreach ($stores as $store) {
            DB::table('stores')->insert(
                [
                    'name' => $store['name']
                ]
            );
        }

        // Assign stores to users
        DB::table('store_user')->insert([
            'store_id' => 1,
            'user_id' => 1 // Admin user
        ]);
    }
}
