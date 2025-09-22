<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Droit;
use App\Models\Group;
use App\Models\Magazin;
use App\Models\Tache;
use App\Models\Ticker;
use App\Models\Presence;
use App\Models\Message;
use App\Models\Notification;
use App\Models\GroupUser;
use App\Models\DroitUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🚀 Début du seeding de la base de données...');

        // 1. Création des utilisateurs spécifiques
        $this->command->info('👥 Création des utilisateurs...');
        $user1 = User::factory()->larios()->create();
        $user2 = User::factory()->lawale()->create();

        // Création d'utilisateurs supplémentaires
        $users = User::factory(20)->create();
        $users->push($user1);
        $users->push($user2);

        $this->command->info('✅ ' . $users->count() . ' utilisateurs créés');

        // 2. Création des droits
        $this->command->info('🔐 Création des droits...');
        $droits = collect([
            ['nom' => 'assigner_tache', 'description' => 'Permet d\'assigner des tâches aux collaborateurs'],
            ['nom' => 'gerer_magazin', 'description' => 'Permet de gérer l\'inventaire du magasin'],
            ['nom' => 'voir_presence', 'description' => 'Permet de consulter les présences des collaborateurs'],
            ['nom' => 'gerer_groupes', 'description' => 'Permet de créer et gérer les groupes de discussion'],
            ['nom' => 'envoyer_messages', 'description' => 'Permet d\'envoyer des messages et fichiers'],
            ['nom' => 'gerer_utilisateurs', 'description' => 'Permet de gérer les comptes utilisateurs'],
            ['nom' => 'voir_rapports', 'description' => 'Permet de consulter les rapports et statistiques'],
            ['nom' => 'gerer_droits', 'description' => 'Permet de gérer les permissions des utilisateurs'],
            ['nom' => 'creer_tickets', 'description' => 'Permet de créer des tickets de support'],
            ['nom' => 'gerer_notifications', 'description' => 'Permet de gérer les notifications système']
        ])->map(function ($droit) {
            return Droit::create($droit);
        });

        $this->command->info('✅ ' . $droits->count() . ' droits créés');

        // 3. Attribution des droits aux utilisateurs
        $this->command->info('🔗 Attribution des droits aux utilisateurs...');
        $user1->droits()->attach($droits->pluck('id'));
        $user2->droits()->attach($droits->take(5)->pluck('id')); // Moins de droits pour le 2ème utilisateur

        // Quelques autres utilisateurs avec des droits aléatoires
        $users->take(10)->each(function ($user) use ($droits) {
            $user->droits()->attach($droits->random(fake()->numberBetween(2, 6))->pluck('id'));
        });

        $this->command->info('✅ Droits attribués aux utilisateurs');

        // 4. Création des groupes
        $this->command->info('👥 Création des groupes...');
        $groupes = collect([
            ['name' => 'Développement Web', 'created_by' => $user1->id],
            ['name' => 'Marketing Digital', 'created_by' => $user2->id],
            ['name' => 'Ressources Humaines', 'created_by' => $users->random()->id],
            ['name' => 'Support Technique', 'created_by' => $users->random()->id],
            ['name' => 'Design & Création', 'created_by' => $users->random()->id],
            ['name' => 'Ventes & Commerce', 'created_by' => $users->random()->id],
            ['name' => 'Finance & Comptabilité', 'created_by' => $users->random()->id],
            ['name' => 'Projets Spéciaux', 'created_by' => $users->random()->id]
        ])->map(function ($groupe) {
            return Group::create($groupe);
        });

        $this->command->info('✅ ' . $groupes->count() . ' groupes créés');

        // 5. Attribution des utilisateurs aux groupes
        $this->command->info('🔗 Attribution des utilisateurs aux groupes...');
        $groupes->each(function ($groupe) use ($users) {
            $membres = $users->random(fake()->numberBetween(3, 8));
            $groupe->users()->attach($membres->pluck('id'));
        });

        $this->command->info('✅ Utilisateurs ajoutés aux groupes');

        // 6. Création de l'inventaire (magasin)
        $this->command->info('📦 Création de l\'inventaire...');
        Magazin::factory(50)->create();
        $this->command->info('✅ Inventaire créé');

        // 7. Création des tâches
        $this->command->info('📋 Création des tâches...');
        Tache::factory(30)->create();
        $this->command->info('✅ Tâches créées');

        // 8. Création des tickets
        $this->command->info('🎫 Création des tickets...');
        Ticker::factory(25)->create();
        $this->command->info('✅ Tickets créés');

        // 9. Création des présences
        $this->command->info('📅 Création des présences...');
        Presence::factory(100)->create();
        $this->command->info('✅ Présences créées');

        // 10. Création des messages
        $this->command->info('💬 Création des messages...');
        $messages = Message::factory(50)->create();

        // Mettre à jour les messages de groupe avec les vrais IDs de groupes
        $groupMessages = $messages->whereNotNull('group_id');
        $groupMessages->each(function ($message) use ($groupes) {
            $message->update(['group_id' => $groupes->random()->id]);
        });

        $this->command->info('✅ Messages créés');

        // 11. Création des notifications
        $this->command->info('🔔 Création des notifications...');
        $notifications = collect();
        $messages->take(20)->each(function ($message) use ($users, $notifications) {
            $randomUsers = $users->random(fake()->numberBetween(1, 3));
            $randomUsers->each(function ($user) use ($message, $notifications) {
                $notifications->push([
                    'user_id' => $user->id,
                    'message_id' => $message->id,
                    'statut' => fake()->randomElement(['non_lu', 'lu']),
                    'is_read' => fake()->boolean(30),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            });
        });

        foreach ($notifications->chunk(50) as $chunk) {
            \DB::table('notifications')->insert($chunk->toArray());
        }

        $this->command->info('✅ Notifications créées');

        // 12. Création des entrées pivot supplémentaires
        $this->command->info('🔗 Création des relations pivot supplémentaires...');

        // GroupUser supplémentaires
        $additionalGroupUsers = collect();
        for ($i = 0; $i < 20; $i++) {
            $additionalGroupUsers->push([
                'group_id' => $groupes->random()->id,
                'user_id' => $users->random()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        \DB::table('group_user')->insert($additionalGroupUsers->toArray());

        // DroitUser supplémentaires
        $additionalDroitUsers = collect();
        for ($i = 0; $i < 30; $i++) {
            $additionalDroitUsers->push([
                'user_id' => $users->random()->id,
                'droit_id' => $droits->random()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        \DB::table('droit_user')->insert($additionalDroitUsers->toArray());

        $this->command->info('✅ Relations pivot créées');

        $this->command->info('🎉 Seeding terminé avec succès !');
        $this->command->info('📊 Résumé :');
        $this->command->info('   👥 Utilisateurs : ' . $users->count());
        $this->command->info('   🔐 Droits : ' . $droits->count());
        $this->command->info('   👥 Groupes : ' . $groupes->count());
        $this->command->info('   📦 Articles en magasin : ' . Magazin::count());
        $this->command->info('   📋 Tâches : ' . Tache::count());
        $this->command->info('   🎫 Tickets : ' . Ticker::count());
        $this->command->info('   📅 Présences : ' . Presence::count());
        $this->command->info('   💬 Messages : ' . Message::count());
        $this->command->info('   🔔 Notifications : ' . \DB::table('notifications')->count());
    }
}
