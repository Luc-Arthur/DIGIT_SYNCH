<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nomsFrancais = [
            'Martin', 'Bernard', 'Dubois', 'Thomas', 'Robert', 'Richard', 'Petit', 'Durand', 'Leroy', 'Moreau',
            'Simon', 'Laurent', 'Lefebvre', 'Michel', 'Garcia', 'David', 'Bertrand', 'Roux', 'Vincent', 'Fournier',
            'Girard', 'André', 'Lévesque', 'Mercier', 'Dupont', 'Lambert', 'Bonnet', 'François', 'Martinez', 'Legrand',
            'Garnier', 'Faure', 'Rousseau', 'Blanc', 'Guerin', 'Muller', 'Henry', 'Roussel', 'Nicolas', 'Perrin',
            'Morin', 'Mathieu', 'Clement', 'Gauthier', 'Dumont', 'Lopez', 'Fontaine', 'Chevalier', 'Robin', 'Masson'
        ];

        $prenomsFrancais = [
            'Jean', 'Pierre', 'Marie', 'Sophie', 'Michel', 'Catherine', 'Philippe', 'Isabelle', 'Christophe', 'Sylvie',
            'Nicolas', 'Valérie', 'Laurent', 'Christine', 'Thierry', 'Françoise', 'Patrick', 'Monique', 'Frédéric', 'Jacqueline',
            'David', 'Sandrine', 'Stéphane', 'Véronique', 'Sébastien', 'Nathalie', 'Julien', 'Brigitte', 'Antoine', 'Patricia',
            'Thomas', 'Élisabeth', 'Matthieu', 'Dominique', 'Romain', 'Céline', 'Benjamin', 'Corinne', 'Alexandre', 'Mireille',
            'Maxime', 'Annie', 'Vincent', 'Danielle', 'Florian', 'Renée', 'Adrien', 'Yvette', 'Lucas', 'Bernadette'
        ];

        $nom = fake()->randomElement($nomsFrancais);
        $prenom = fake()->randomElement($prenomsFrancais);

        return [
            'name' => $prenom . ' ' . $nom,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Créer l'utilisateur spécifique fourni
     */
    public function larios(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Samuel Larios',
            'email' => 'larioss383@gmail.com',
            'password' => Hash::make('motdepasse'),
        ]);
    }

    /**
     * Créer l'utilisateur spécifique fourni
     */
    public function lawale(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Lawale Adbula',
            'email' => 'lawaleadbula@gmail.com',
            'password' => Hash::make('mpassword'),
        ]);
    }
}
