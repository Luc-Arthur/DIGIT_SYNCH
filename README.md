<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# 📌 Plateforme de Gestion des Tâches et du Support IT

## 📖 Description
Ce projet est une **application web développée avec Laravel 11** qui centralise :  
- La **gestion des projets** (mode Kanban),  
- La **gestion des demandes IT (ticketing)**,  
- L’**inventaire du matériel informatique**.  

🎯 **Objectif :** Fournir une solution ergonomique, sécurisée et performante afin d’améliorer la **productivité** et la **collaboration** des équipes techniques et métiers.  

---

## 🚀 Fonctionnalités principales

### 🔹 Gestion de Projets
- Tableaux Kanban interactifs (drag & drop)  
- Attribution des tâches et deadlines  
- Commentaires et pièces jointes sur les tâches  
- Dashboard de suivi d’avancement  

### 🔹 Ticketing IT
- Création et suivi des tickets par catégorie  
- Attribution manuelle ou automatique aux techniciens  
- Système de priorités et filtres avancés  
- Export Excel et base de connaissances intégrée  

### 🔹 Inventaire IT
- Gestion des équipements (ajout, attribution, état)  
- Suivi des garanties avec alertes automatiques  
- Liaison des équipements avec les tickets  
- Génération de QR codes pour le scanning  

---

## 🛠️ Stack Technique
- **Backend :** Laravel 11 (PHP)  
- **Frontend :** Blade, Livewire, Tailwind CSS  
- **Base de données :** MySQL  
- **Outils :** Composer, Artisan, Git, Laravel Excel  

---

## 📂 Installation & Configuration

### 🔧 Prérequis
- PHP >= 8.2  
- Composer  
- MySQL >= 8  
- Node.js & NPM  ### ⚙️ Étapes d’installation
```bash
# 1. Cloner le projet
git clone https://github.com/[username]/gestion-it.git

# 2. Accéder au dossier du projet
cd gestion-it

# 3. Installer les dépendances PHP
composer install

# 4. Installer les dépendances front-end
npm install && npm run dev

# 5. Copier le fichier d'environnement
cp .env.example .env

# 6. Générer la clé de l'application
php artisan key:generate

# 7. Configurer la base de données dans .env puis exécuter les migrations
php artisan migrate --seed

# 8. Lancer le serveur de développement
php artisan serve
```


📊 Planification Prévisionnelle
Phase	Durée estimée	Livrables
Analyse & Design	2 semaines	Spécifications, maquettes
Développement MVP	4 semaines	Modules core + authentification
Intégration & Tests	2 semaines	Tests utilisateurs, corrections
Déploiement & Formation	1 semaine	Documentation, formation équipes
✅ Résultats Attendus

Centralisation des processus IT et projets

Suivi clair et en temps réel

Réduction des pertes de temps liées aux échanges informels

Code maintenable et extensible

👤 Auteur

Luc-Arthur LAWALE – Développement & Conception

Stage réalisé chez KAS DIGIT

Supervisé par Samuel Larios KIKI
