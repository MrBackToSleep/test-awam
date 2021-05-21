## Installation

_Renseignez vos identifiants MySQL dans le fichier ``.env`` puis passez aux étapes suivantes._

Obtention des dépendances : 
```
composer update
```
Création de la base de données
```
php artisan db:create
```
_Si ça ne marche pas, c'est probablement que votre utilisateur MySQL n'a pas les droits pour la création d'une base de données. Vous devrez donc la créer à la main._

Création des tables par les migrations
```
php artisan migrate
```
_La table 'Devise' est déjà pré-remplie par la migration_

##Pour que le mail s'envoie automatiquement
Rien de plus simple qu'une petite tâche CRON qui va exécuter la route ``monsite.fr/sendMail`` tous les jours à l'heure souhaitée.

##Démarche
Pour convertir des données monétaires, la manière la plus pratique c'est d'avoir une donnée étalon. Comme pour le système bancaire actuel où toute l'économie est basée sur le dollar (USD), j'ai décidé de prendre le dollar (USD) comme valeur étalon. De cette manière on pourra facilement ajouter de nouvelles devises juste en les renseignant en base de données accompagnées de leurs équivalents dollar (USD).

## Ce que j'aurais fait si j'avais eu plus de temps
+ Amélioration de l'interface
+ Vérification des champs avant l'envoi PHP (Impossibilité de saisir autre chose que des chiffres et des virgules dans les champs montants)
+ Rendre un peu plus propre tout ce qui est ``$montant1``, ``$montant2``, ``$devise1``, ``$devise2`` en le faisant passer par une collection et en bouclant dessus de manière à ce que le code soit plus adaptable et peut-être un peu moins moche.
+ Le mail aurait certainement été mieux charté et j'aurais essayé de passer par une vue blade plutôt que d'écrire l'HTML en dur dans la fonction du service.
+ On pourrait facilement implémenter des calculs type soustraction, multiplication, division en mettant une nouvelle liste déroulante pour choisir l'opérateur désiré.
+ Un taux de change en temps réel en s'appuyant sur une API qui mettrait automatiquement à jour les équivalents dollar (USD) des devises.
+ Je serais allé m'acheter à manger, j'ai faim. 
