<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Droit>
 */
class DroitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $droits = [
            [
                'nom' => 'assigner_tache',
                'description' => 'Permet d\'assigner des tâches aux collaborateurs'
            ],
            [
                'nom' => 'gerer_magazin',
                'description' => 'Permet de gérer l\'inventaire du magasin'
            ],
            [
                'nom' => 'voir_presence',
                'description' => 'Permet de consulter les présences des collaborateurs'
            ],
            [
                'nom' => 'gerer_groupes',
                'description' => 'Permet de créer et gérer les groupes de discussion'
            ],
            [
                'nom' => 'envoyer_messages',
                'description' => 'Permet d\'envoyer des messages et fichiers'
            ],
            [
                'nom' => 'gerer_utilisateurs',
                'description' => 'Permet de gérer les comptes utilisateurs'
            ],
            [
                'nom' => 'voir_rapports',
                'description' => 'Permet de consulter les rapports et statistiques'
            ],
            [
                'nom' => 'gerer_droits',
                'description' => 'Permet de gérer les permissions des utilisateurs'
            ],
            [
                'nom' => 'creer_tickets',
                'description' => 'Permet de créer des tickets de support'
            ],
            [
                'nom' => 'gerer_notifications',
                'description' => 'Permet de gérer les notifications système'
            ]
        ];

        $droit = fake()->unique()->randomElement($droits);

        return [
            'nom' => $droit['nom'],
            'description' => $droit['description'],
        ];
    }
}
