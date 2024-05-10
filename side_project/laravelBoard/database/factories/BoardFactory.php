<?php

namespace Database\Factories;

use App\Models\BoardName;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $arrImg = [
            '/public/img/img.gif'
            ,'/public/img/img (1).gif'
            ,'/public/img/d2c9362e660d12979932821fc4401e2e.gif'
            ,'/public/img/cfe1f6af609f2d93f329bdd9381d3220.gif'
            ,'/public/img/1517493790809.gif'
        ];
        return [
            'user_id' => User::inRandomOrder()->first()->id // 랜덤으로 id 가져온다
            ,'type' => BoardName::inRandomOrder()->first()->type // 랜덤으로 type 가져온다
            ,'title' => $this->faker->realText(50)
            ,'content' => $this->faker->realText(100)
            ,'img' => Arr::random($arrImg)
        ];
    }
}
