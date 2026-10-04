<?php

namespace Database\Factories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Posts>
 */
class CreatePostsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'name'=>$this->faker->name,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phone,
            'message'=>$this->faker->message,
        ];
    }
}
