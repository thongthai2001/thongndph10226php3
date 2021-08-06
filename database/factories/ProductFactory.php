<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/uploads/products'), $width = 640, $height = 480, 'cats', false);
        return [
            "name" => $this->faker->name(),
            "price" => rand(1, 200),
            "quantity" => rand(1, 200), 
            "category_id" => Category::all()->ramdom()->id,
            "image" => "uploads/products" . $imgPath,
           

        ];
    }
}
