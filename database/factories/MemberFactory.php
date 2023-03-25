<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $company = array();

        for($i = 1; $i <= 15; $i++){
            $company[$i] = $i;
        }
        return [
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName,
            'designation' => fake()->jobTitle,
            'company_id' => fake()->randomElement($company),
        ];
    }
}
