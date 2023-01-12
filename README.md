# P8-ToDoAndCo
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/837e4ada761c4f4292bc9b360e88aba6)](https://www.codacy.com/gh/trousse/todo-oc/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=trousse/todo-oc&amp;utm_campaign=Badge_Grade)

Amélioration et documentation d'un projet existant ToDo & Co.

## Installation
1. Clonez ou téléchargez le repository GitHub dans le dossier voulu :
```
    git clone https://github.com/trousse/todo-oc.git
```
2. Configurez vos variables d'environnement tel que la connexion à la base de données dans le fichier `.env.local` qui devra être crée à la racine du projet en réalisant une copie du fichier `.env` ainsi que la connexion à la base de données de test dans le fichier `env.test`.

3. Téléchargez et installez les dépendances du projet avec [Composer](https://getcomposer.org/download/) :
```
    composer install --dev
```

4. configurer votre fichier env.local en ajoutant la configuration de la base de donné
```
    ###> doctrine/doctrine-bundle ###
    DATABASE_URL="mysql://root:root@127.0.0.1:8889/todo"
    ###< doctrine/doctrine-bundle ###
```

5. Créez la base de données si elle n'existe pas déjà, taper la commande ci-dessous en vous plaçant dans le répertoire du projet :
```
    php bin/console doctrine:database:create
```

6. Créez les différentes tables de la base de données en appliquant les migrations :
```
    php bin/console doctrine:migrations:migrate
```
7. (Optionnel) Installez les fixtures pour avoir une démo de données fictives en développement :
```
    php bin/console doctrine:fixtures:load
    
8. launch Test coverage 

    XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html public/test-coverage
```
il est necessaire d'ajouter la ligne suivante et d'intaler xdebug
            zend_extension="xdebug.so"
```

## Normes à réspecter 

le projet contient plusieurs exigences

1. le code doit respecter les normes définie sur codacy et tous commit doit avoir la note minimal B
    https://app.codacy.com/gh/trousse/todo-oc/dashboard
```

2. toute nouvelle fonctionalité dois validé les tests existant et doit implémenter un test fonctionel 
les test ce situe dans le dossier test, il est necessaire de crée une nouvelle fonction de test pour toute nouvelle fonctionalité 
la fonction doit commencé par test et doit etre ecrite dans le bon controler 
une fois le test ecrit il est necessaire de lancer la commande en mode coverage

   XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html public/test-coverage
```


