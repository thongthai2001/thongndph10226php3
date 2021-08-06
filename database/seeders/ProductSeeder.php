<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactoryProduct;
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
        $faker = FakerFactoryProduct::create();
        $imgPath = $faker->image(storage_path('app/public/uploads/products'), $width = 640, $height = 280, 'cats', false);
        for ($i=0 ; $i < 5 ; $i++ ) { 
            $data = [ // các cột cần fake dữ liệu
                'name'=>$faker->name ,
                'price'=>$faker->randomDigit  ,
                'image'=>"uploads/products/" . $imgPath,
                'category_id'=>$faker->numberBetween($min = 1, $max = 90),
                'quantity'=>$faker->randomDigit  ,
            ];
            DB::table('products')->insert($data); // tạo dữ liệu fake vào db
        }
    }
}
