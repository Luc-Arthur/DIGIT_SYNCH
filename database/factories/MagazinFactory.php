<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Magazin>
 */
class MagazinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produits = [
            ['nom' => 'Ordinateur Portable', 'reference' => 'PC-DELL-001', 'prix' => 899.99],
            ['nom' => 'Souris Optique', 'reference' => 'MS-LOGI-002', 'prix' => 25.50],
            ['nom' => 'Clavier Mécanique', 'reference' => 'KB-CHERRY-003', 'prix' => 120.00],
            ['nom' => 'Écran 24 pouces', 'reference' => 'MN-SAMS-004', 'prix' => 199.99],
            ['nom' => 'Imprimante Laser', 'reference' => 'PR-HP-005', 'prix' => 299.99],
            ['nom' => 'Casque Audio', 'reference' => 'HD-SONY-006', 'prix' => 89.99],
            ['nom' => 'Webcam HD', 'reference' => 'WC-LOGI-007', 'prix' => 65.00],
            ['nom' => 'Disque Dur Externe 1TB', 'reference' => 'HD-WD-008', 'prix' => 79.99],
            ['nom' => 'Routeur WiFi', 'reference' => 'RT-TP-009', 'prix' => 149.99],
            ['nom' => 'Onduleur 600VA', 'reference' => 'UPS-APC-010', 'prix' => 89.99],
            ['nom' => 'Tablette Graphique', 'reference' => 'TB-WACOM-011', 'prix' => 199.99],
            ['nom' => 'Microphone USB', 'reference' => 'MIC-BLUE-012', 'prix' => 129.99],
            ['nom' => 'Enceintes Bluetooth', 'reference' => 'SP-JBL-013', 'prix' => 79.99],
            ['nom' => 'Caméra de Surveillance', 'reference' => 'CCTV-HIK-014', 'prix' => 159.99],
            ['nom' => 'Switch Ethernet 8 ports', 'reference' => 'SW-CISCO-015', 'prix' => 89.99]
        ];

        $produit = fake()->randomElement($produits);

        $rayons = [
            'Informatique',
            'Périphériques',
            'Réseau',
            'Audio/Vidéo',
            'Sécurité',
            'Stockage',
            'Impression',
            'Accessoires'
        ];

        return [
            'nom_produit' => $produit['nom'],
            'reference' => $produit['reference'],
            'description' => fake()->optional(0.7)->sentence(10),
            'quantite' => fake()->numberBetween(0, 100),
            'prix_unitaire' => $produit['prix'],
            'emplacement' => fake()->randomElement($rayons) . ' - ' . fake()->randomElement(['A1', 'B2', 'C3', 'D4', 'E5']),
        ];
    }
}
