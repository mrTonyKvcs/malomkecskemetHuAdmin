<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameApplicant>
 */
class GameApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random =  $randomNumber = random_int(0, 10);

        return [
            'game_id' => 1,
            'name' => fake()->name,
            'email' => fake()->email,
            'phone_number' => fake()->phoneNumber(),
            'accept_giveaway_rules' => true,
            'accept_gdpr' => true,
            'sign_up_for_newsletter' => true,
            'created_at' => Carbon::parse('2022-09-08 10:00:00')->addHours($random)->format('Y-m-d H:i:s')
        ];
    }
}
