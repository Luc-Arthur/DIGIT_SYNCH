<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presence>
 */
class PresenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-30 days', 'now');

        // Générer des heures d'arrivée réalistes (entre 7h et 10h)
        $heureArrivee = fake()->dateTimeBetween(
            $date->format('Y-m-d') . ' 07:00:00',
            $date->format('Y-m-d') . ' 10:00:00'
        );

        // Générer des heures de départ réalistes (entre 16h et 19h)
        $heureDepart = fake()->dateTimeBetween(
            $date->format('Y-m-d') . ' 16:00:00',
            $date->format('Y-m-d') . ' 19:00:00'
        );

        // S'assurer que l'heure de départ est après l'heure d'arrivée
        if ($heureDepart <= $heureArrivee) {
            $heureDepart = (clone $heureArrivee)->modify('+8 hours');
        }

        $ips = [
            '192.168.1.100',
            '192.168.1.101',
            '192.168.1.102',
            '192.168.1.103',
            '192.168.1.104',
            '10.0.0.50',
            '10.0.0.51',
            '10.0.0.52',
            '172.16.0.100',
            '172.16.0.101'
        ];

        return [
            'user_id' => User::factory(),
            'date' => $date->format('Y-m-d'),
            'heure_arrivee' => $heureArrivee->format('H:i:s'),
            'heure_depart' => $heureDepart->format('H:i:s'),
            'ip_address' => fake()->randomElement($ips),
            'valide' => fake()->boolean(85), // 85% de présences validées
        ];
    }
}
