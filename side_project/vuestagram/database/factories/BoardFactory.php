<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'content' => $this->faker->realText(rand(10, 100)),
            'img' => '/img/1517493790809.gif',
            'img' => '/img/14.gif',
            'img' => '/img/50.gif',
            'like' => rand(1, 300),
            // 'img' => '/img/cat'.rand(1,3).'.jpg', : 이미지 이름 뒤에 숫자 만 늘어난다
        ];
    }
}
