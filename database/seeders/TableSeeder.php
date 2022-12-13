<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            'name' => 'Mesa 1'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 2'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 3'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 4'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 5'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 6'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 7'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 8'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 9'
        ]);
        DB::table('tables')->insert([
            'name' => 'Mesa 10'
        ]);
    }
}
