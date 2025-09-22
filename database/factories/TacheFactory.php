<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titres = [
            'Développer une nouvelle fonctionnalité',
            'Rédiger le rapport mensuel',
            'Organiser la réunion d\'équipe',
            'Mettre à jour la documentation',
            'Résoudre les bugs signalés',
            'Préparer la présentation client',
            'Effectuer les tests de sécurité',
            'Optimiser les performances du site',
            'Former les nouveaux employés',
            'Gérer les demandes de support',
            'Analyser les données de vente',
            'Créer les maquettes graphiques',
            'Mettre en place la sauvegarde',
            'Configurer le nouveau serveur',
            'Rédiger les spécifications techniques'
        ];

        $descriptions = [
            'Cette tâche consiste à développer une nouvelle fonctionnalité pour améliorer l\'expérience utilisateur.',
            'Il est nécessaire de compiler et analyser toutes les données du mois écoulé.',
            'Organisation logistique et préparation de l\'ordre du jour pour la réunion hebdomadaire.',
            'Mettre à jour tous les guides et manuels de l\'application.',
            'Identifier et corriger tous les problèmes signalés par les utilisateurs.',
            'Préparer un support de présentation professionnel pour la réunion client.',
            'Effectuer une série de tests pour identifier les vulnérabilités potentielles.',
            'Analyser et optimiser les temps de chargement et l\'utilisation des ressources.',
            'Organiser des sessions de formation pour l\'intégration des nouveaux membres.',
            'Traiter et répondre à toutes les demandes d\'assistance technique.',
            'Analyser les tendances et créer des rapports détaillés sur les performances.',
            'Concevoir l\'interface utilisateur selon les spécifications du projet.',
            'Mettre en place un système de sauvegarde automatique et sécurisé.',
            'Installation et configuration du nouveau matériel serveur.',
            'Rédiger les spécifications fonctionnelles et techniques du projet.'
        ];

        $statuts = ['en_attente', 'en_cours', 'terminee', 'annulee'];

        return [
            'titre' => fake()->randomElement($titres),
            'description' => fake()->randomElement($descriptions),
            'assigner_par' => User::factory(),
            'assigne_a' => User::factory(),
            'statut' => fake()->randomElement($statuts),
            'date_debut' => fake()->optional(0.8)->dateTimeBetween('-1 month', 'now'),
            'date_fin' => fake()->optional(0.6)->dateTimeBetween('now', '+1 month'),
        ];
    }
}
