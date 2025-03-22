<?php

namespace Database\Factories;

use App\Models\Fcomponent;
use Illuminate\Database\Eloquent\Factories\Factory;

class FcomponentFactory extends Factory
{
    protected $model = Fcomponent::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
