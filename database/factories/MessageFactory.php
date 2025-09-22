<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $contenus = [
            'Bonjour à tous, j\'espère que vous allez bien !',
            'Je voulais vous informer que la réunion de demain est maintenue.',
            'N\'oubliez pas de valider vos feuilles de temps avant vendredi.',
            'Le nouveau projet commence la semaine prochaine.',
            'Merci à tous pour votre travail sur ce dossier.',
            'Avez-vous des questions concernant la nouvelle procédure ?',
            'Je partage avec vous le compte-rendu de la dernière réunion.',
            'Les objectifs du mois ont été atteints, félicitations !',
            'Une formation aura lieu jeudi prochain sur les nouveaux outils.',
            'Pensez à sauvegarder régulièrement votre travail.',
            'Le serveur sera en maintenance ce weekend.',
            'Nouveau protocole de sécurité à appliquer dès aujourd\'hui.',
            'Les demandes de congés doivent être soumises avant le 25.',
            'Merci de répondre aux emails en attente.',
            'Bonne nouvelle : augmentation du budget pour les formations.'
        ];

        $typeMessage = fake()->randomElement(['groupe', 'prive', 'prive']); // Plus de messages privés

        $statuts = ['sent', 'delivered', 'read'];

        $data = [
            'sender_id' => User::factory(),
            'content' => fake()->randomElement($contenus),
            'file_path' => null,
            'file_type' => null,
            'file_size' => null,
            'status' => fake()->randomElement($statuts),
        ];

        if ($typeMessage === 'groupe') {
            $data['group_id'] = 1; // Sera défini lors du seeding
            $data['receiver_id'] = null;
        } else {
            $data['group_id'] = null;
            $data['receiver_id'] = User::factory();
        }

        return $data;
    }

    /**
     * Créer un message avec un fichier
     */
    public function withFile(): static
    {
        $fileTypes = ['image', 'video', 'audio', 'document'];
        $fileType = fake()->randomElement($fileTypes);

        $files = [
            'image' => [
                'presentation_projet.jpg',
                'schema_architecture.png',
                'photo_equipe.jpg',
                'logo_entreprise.png'
            ],
            'video' => [
                'demo_fonctionnalite.mp4',
                'tutoriel_utilisation.mp4',
                'reunion_recording.mp4'
            ],
            'audio' => [
                'message_vocal.mp3',
                'interview_client.mp3',
                'note_vocal.mp3'
            ],
            'document' => [
                'rapport_mensuel.docx',
                'specifications.pdf',
                'contrat_client.pdf',
                'manuel_utilisateur.pdf'
            ]
        ];

        $fileName = fake()->randomElement($files[$fileType]);
        $fileSize = fake()->numberBetween(1024, 10485760); // 1KB à 10MB

        return $this->state(fn (array $attributes) => [
            'content' => fake()->optional(0.7)->randomElement([
                'Voici le document demandé.',
                'Je vous partage ce fichier important.',
                'Document joint pour information.',
                'Veuillez trouver ci-joint le rapport.',
                'Voici la vidéo de présentation.'
            ]),
            'file_path' => 'uploads/' . $fileType . 's/' . $fileName,
            'file_type' => $fileType,
            'file_size' => $fileSize,
        ]);
    }
}
