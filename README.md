# F1_back

Projet fil rouge du semestre 2 en web 2 à [Hetic](https://www.hetic.net/).

Réalisation d'une dataviz sur le formule 1.

Partie Back end.

## Choix technique

* [Php 7.2](https://php.net/)
    * Open source
    * Grande communauté
    * Rapide, flexible et sécurisé
    * De nombreux frameworks et packages disponibles
    * Connexion simple avec mysql
* [Symfony 4.2](https://symfony.com/)
    * Open source
    * Grande communauté
    * Framework très stable
    * Avoir à disposition un ensemble de composants PHP réutilisables
    * Mettre fin au code répétitif
    * Accélérer la création de notre api
* [Doctrine](https://www.doctrine-project.org/)
    * Grande communauté 
    * Intégrer dans de nombreux framework comme symfony
    * Très stable
    * Fonctions très flexible et efficace pour faire des requêtes en base et pour le mappage d'objet
* [ApiPlatform](https://api-platform.com/)
    * API Platform est un ensemble d’outils permettant de créer des API Web.
    * Accélère grandement la création d'Api avec Symfony
    * Contient Nelmio pour la documentation
    * Utilise le json-ld pour organiser les données

## Start the project

`git clone`

`composer install`

`add database and database connection in .env.local`

`php bin/console server:run`

## Api

You can find the [nelmio](https://github.com/nelmio/NelmioApiDocBundle) documentation on `/api` route.
