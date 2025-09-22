<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuts = ['non_lu', 'lu'];

        return [
            'user_id' => User::factory(),
            'message_id' => 1, // Sera défini lors du seeding
            'statut' => fake()->randomElement($statuts),
            'is_read' => fake()->boolean(30), // 30% de notifications lues
        ];
    }
}
