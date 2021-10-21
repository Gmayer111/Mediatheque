# Mediatheque

Déploiement en local

1. Installation du serveur local MAMP sur mon système d'exploitation (macOS BIG SUR)
2. Ajout du chemin dans le fichier httpd-vhosts.conf vers mon futur projet Symfony
3. Création du nouveau dossier en ligne de commande (mkdir mediatheque) puis ouverture du fichier avec la commande cd mediatheque
4. Initialisation du projet Symfony à la racine avec la commande composer create-project symfony/skeleton symfony (j'ai ici fait le choix de ne pas installer un projet en website-skeleton pour pouvoir avec un meilleur appercu des futures dépendances que j'installerai)
5. Initialisation d'un dépôt Git avec la commande git init et ouverture d'un répertoire distant Github
6. Pour vérifier que le projet et opérationnel :
 - J'ai décommenter les lignes du fichier routes.yaml
 - Création d'un contrôleur temporaire avec un fonction sayHello 



Déploiement en production

- Tout d’abord initialisation d’un projet Heroku avec la commande heroku create
- Création du fichier procfile avec la commande echo 'web: heroku-php-apache2 public/' > Procfile
- pour indiquer à Heroku où pointer pour ouvrir le répertoire qui servira à ouvrir les fichiers
- Installation d’une base de donnée distante avec l’addons JawsDB mysql : heroku addons:create jawsdb:kitefin
- Paramètrage du fichier .env pour indiquer à Heroku que l’on souhaite qu’il manipule le projet toujours en mode prod
- Par défaut Heroku va jouer le composer install, il faut donc indiquer à heroku de faire les migrations de la base de données
- Modification du fichier .htacces qui va venir indiquer à apache comment réécrire les url avec le bundle composer require symfony/apache-pack
- Push vers le remote heroku avec la commande git push heroku main pour verssionner mon projet vers le dépôt heroku
