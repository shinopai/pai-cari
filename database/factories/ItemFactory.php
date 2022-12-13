<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $condition_arr = [
            '新品', 'ほぼ未使用', '目立った傷汚れなし', 'やや傷汚れあり', '傷汚れあり'
        ];
        $postage_arr = [
            '送料込み', '着払い'
        ];
        $image_arr = [
            'img_item01.webp',
            'img_item02.jpg',
            'img_item03.jpg',
            'img_item04.jpg',
            'img_item05.jpg'
        ];

        return [
            'name' => $this->faker->city(),
            'price' => $this->faker->numberBetween(300, 999999),
            'description' => $this->faker->text(300),
            'condition' => $condition_arr[rand(0, 4)],
            'item_image' => $image_arr[rand(0, 4)],
            'postage' => $postage_arr[rand(0, 1)],
            'brand_id' => rand(1, Brand::count()),
            'user_id' => rand(1, User::count())
        ];
    }
}
