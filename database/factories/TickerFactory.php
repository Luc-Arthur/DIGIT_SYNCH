<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticker>
 */
class TickerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titres = [
            'Problème de connexion internet',
            'Mot de passe oublié',
            'Imprimante ne fonctionne pas',
            'Logiciel plante régulièrement',
            'Demande d\'accès à un dossier',
            'Configuration email impossible',
            'Ordinateur très lent',
            'Erreur lors de l\'installation',
            'Problème d\'affichage',
            'Demande de nouveau matériel',
            'Accès VPN non fonctionnel',
            'Sauvegarde échoue',
            'Site web inaccessible',
            'Téléphone portable défectueux',
            'Formation sur un logiciel'
        ];

        $contenus = [
            'Bonjour, je n\'arrive plus à me connecter à internet depuis ce matin. Le WiFi semble fonctionner mais aucune page ne se charge.',
            'J\'ai oublié mon mot de passe et je n\'arrive pas à le réinitialiser. Pouvez-vous m\'aider ?',
            'L\'imprimante du bureau ne répond plus. Elle était en train d\'imprimer et s\'est arrêtée subitement.',
            'Le logiciel de gestion des stocks plante plusieurs fois par jour, ce qui bloque notre travail.',
            'Je souhaite avoir accès au dossier partagé "Projets_2024" pour consulter les documents.',
            'Impossible de configurer mon compte email professionnel sur mon téléphone portable.',
            'Mon ordinateur est devenu très lent ces derniers jours. Les applications mettent du temps à s\'ouvrir.',
            'Erreur "Installation failed" lors de la tentative d\'installation du nouveau logiciel.',
            'L\'affichage de mon écran secondaire ne fonctionne plus correctement depuis la mise à jour.',
            'Je souhaite faire une demande pour l\'acquisition d\'un deuxième écran pour améliorer ma productivité.',
            'L\'accès VPN ne fonctionne plus depuis que j\'ai changé mon mot de passe Windows.',
            'La sauvegarde automatique échoue tous les soirs avec un message d\'erreur.',
            'Le site web de l\'entreprise n\'est plus accessible depuis l\'extérieur.',
            'Mon téléphone professionnel ne s\'allume plus depuis ce matin.',
            'Je souhaite suivre une formation sur le nouveau logiciel de CRM.'
        ];

        $statuts = ['non_lu', 'en_cours', 'termine'];

        return [
            'expediteur_id' => User::factory(),
            'destinataire_id' => User::factory(),
            'titre' => fake()->randomElement($titres),
            'contenu' => fake()->randomElement($contenus),
            'statut' => fake()->randomElement($statuts),
        ];
    }
}
