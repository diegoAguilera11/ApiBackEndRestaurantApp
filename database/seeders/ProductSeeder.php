<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'code' => 'cbx4578',
            'name' => 'Coca Cola 3 Litros',
            'description' => 'La unica e inigualable con la receta original.',
            'price' => 2500,
            'stock' => 100,
            'category_id' => 4,
            'image' => 'https://supermarketlinderos.cl/wp-content/uploads/2020/07/cocacola3litros.png',
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'code' => 'kls1298',
            'name' => 'Fideos con salsa',
            'description' => 'Directamente de italia con un toque original insuperable para tu paladar.',
            'price' => 3500,
            'stock' => 50,
            'category_id' => 2,
            'image' => 'https://recetasfideos.pro/wp-content/uploads/2020/03/fideos-con-salsa-de-tomate-y-albahaca.jpg',
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'code' => 'xwy348',
            'name' => 'Panqueques',
            'description' => 'Que mejor forma de empezar tu día que con unos ricos panqueques frescos.',
            'price' => 1800,
            'stock' => 40,
            'category_id' => 1,
            'image' => 'https://recetinas.com/wp-content/uploads/2022/07/panqueques.jpg',
        ]);

        DB::table('products')->insert([
            'id' => 4,
            'code' => 'zgh0923',
            'name' => 'Pavo Relleno',
            'description' => 'Exquisito pavo relleno con los productos mas finos y frescos.',
            'price' => 23000,
            'stock' => 12,
            'category_id' => 3,
            'image' => 'https://t1.rg.ltmcdn.com/es/posts/0/4/7/pavo_relleno_para_navidad_tradicional_50740_orig.jpg',
        ]);
    }
}
