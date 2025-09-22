<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Système de Gestion d'Entreprise</title>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="bg-gray-50">
    <div id="app">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        🏢 Système de Gestion
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Plateforme de gestion d'entreprise avec données en français
                    </p>
                </div>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-center mb-6">Connexion</h2>

                    <div class="space-y-4">
                        <div class="text-sm text-gray-600">
                            <p class="font-medium">Utilisateurs de test :</p>
                            <div class="mt-2 space-y-1">
                                <p><strong>Samuel Larios</strong></p>
                                <p>Email: larioss383@gmail.com</p>
                                <p>Mot de passe: motdepasse</p>
                            </div>
                            <div class="mt-3 space-y-1">
                                <p><strong>Lawale Adbula</strong></p>
                                <p>Email: lawaleadbula@gmail.com</p>
                                <p>Mot de passe: mpassword</p>
                            </div>
                        </div>

                        <div class="pt-4">
                            <a href="{{ route('login') }}"
                               class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Se connecter
                            </a>
                        </div>

                        <div class="pt-4">
                            <a href="{{ route('register') }}"
                               class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                S'inscrire
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center text-sm text-gray-500">
                    <p>📊 Base de données peuplée avec :</p>
                    <p>• 22 utilisateurs • 10 droits • 8 groupes</p>
                    <p>• 50 articles • 30 tâches • 25 tickets</p>
                    <p>• 100 présences • 50 messages • 36 notifications</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
