@REM supprimer les anciennes versions de migrations
del migrations\Ver*

@REM supprimer la base de données
symfony console doctrine:database:drop --force --no-interaction

@REM créer la base de données
symfony console doctrine:database:create

@REM migrer la base de données
symfony console make:migration --no-interaction

@REM lancer la migration
symfony console doctrine:migrations:migrate --no-interaction

@REM lancer les fixtures
symfony console doctrine:fixtures:load --no-interaction