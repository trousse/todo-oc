# P8-ToDoAndCo

Amélioration et documentation d'un projet existant ToDo & Co.

## Installation
1. Clonez ou téléchargez le repository GitHub dans le dossier voulu :
```
    git clone https://github.com/sorha/P8-ToDoAndCo.git
```
2. Configurez vos variables d'environnement tel que la connexion à la base de données dans le fichier `.env.local` qui devra être crée à la racine du projet en réalisant une copie du fichier `.env` ainsi que la connexion à la base de données de test dans le fichier `env.test`.

3. Téléchargez et installez les dépendances du projet avec [Composer](https://getcomposer.org/download/) :
```
    composer install
```
4. Créez la base de données si elle n'existe pas déjà, taper la commande ci-dessous en vous plaçant dans le répertoire du projet :
```
    php bin/console doctrine:database:create
```
5. Créez les différentes tables de la base de données en appliquant les migrations :
```
    php bin/console doctrine:migrations:migrate
```
6. (Optionnel) Installez les fixtures pour avoir une démo de données fictives en développement :
```
    php bin/console doctrine:fixtures:load
    
7. launch Test coverage 

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


