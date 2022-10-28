<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;
    /**
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'Product' => 'category 1',
            'slug' => 'category_1',
            'detail' => 'this is a bady of category 1',
            'Image' => $this->faker->imageUrl(),
            'Color'=> 'red',
            'Price'=>'500$',
            'detail' => 'efkierkerifezf',
            'Amount' => '1',
            'QTY' => '5'
        ];
    }
}
