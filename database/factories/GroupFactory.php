<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nomsGroupes = [
            'Développement Web',
            'Marketing Digital',
            'Ressources Humaines',
            'Support Technique',
            'Design & Création',
            'Ventes & Commerce',
            'Finance & Comptabilité',
            'Projets Spéciaux',
            'Formation Continue',
            'Communication Interne',
            'Recherche & Innovation',
            'Qualité & Contrôle',
            'Logistique & Transport',
            'Sécurité Informatique',
            'Administration Générale'
        ];

        return [
            'name' => fake()->unique()->randomElement($nomsGroupes),
            'created_by' => User::factory(),
        ];
    }
}
