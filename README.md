
# Community Event Planner

## Contexte du Projet

Le **Community Event Planner** est une plateforme web permettant aux utilisateurs de découvrir, créer et gérer des événements communautaires locaux. Développé avec Laravel 11, ce projet vise à offrir une expérience intuitive et sécurisée pour la gestion d'événements.

## Objectifs

- **Authentification Sécurisée**: Utilisation de Laravel Breeze pour gérer l'authentification.
- **Gestion des Événements**: CRUD complet pour créer, modifier et supprimer des événements avec filtrage par proximité et catégorie.
- **RSVP et Interaction**: Les utilisateurs peuvent s'inscrire, gérer leurs RSVP et interagir avec d'autres participants.
- **Commentaires**: Possibilité de laisser des commentaires sous chaque événement.

## Technologies et Outils

- **Framework**: Laravel 11
- **Base de Données**: MySQL 
- **Frontend**: Blade + Tailwind CSS
- **Authentification**: Laravel Breeze
- **Outils de Développement**: Artisan CLI (modèles, seeders, factories, Tinker)

## Architecture du Projet

### Gestion des Utilisateurs (users)

- Authentification sécurisée
- Profils utilisateurs
- Middleware de restriction pour l'accès aux fonctionnalités

### Gestion des Événements (events)

- CRUD avec pagination
- Gestion des participants et des RSVP

### Gestion des Commentaires (comments)

- Validation avant soumission
- Possibilité d'ajouter et de supprimer ses commentaires

## Outils et Commandes Artisan

Utilisation intensive des commandes Artisan pour la génération de modèles, migrations, seeders, factories et tests avec Tinker.

--- 

🛠️ Technologies utilisées

- Laravel (Framework PHP)
- PHP
- Eloquent ORM
- MySQL (ou autre SGBD relationnel)
- Blade (templating engine)
- Middleware & Form Requests
- Laravel Migrations
- Factories & Seeders
- Caching (Laravel Cache)
- MVC Architecture
- CRUD Best Practices
