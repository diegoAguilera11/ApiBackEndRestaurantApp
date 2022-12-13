<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'DESAYUNO'
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'ALMUERZO'
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'CENA'
        ]);

        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'BEBIDAS'
        ]);
    }
}
