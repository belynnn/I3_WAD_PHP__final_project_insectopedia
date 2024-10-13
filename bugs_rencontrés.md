# Bugs rencontrés

## À la suite d'un pull et d'un merge dans une autre branche
```
C:\xampp-8-2\htdocs\___final_project_insectopedia>symfony console make:entity
Symfony\Component\ErrorHandler\Error\ClassNotFoundError^ {#75
  #message: """
    Attempted to load class "WebpackEncoreBundle" from namespace "Symfony\WebpackEncoreBundle".\n
    Did you forget a "use" statement for another namespace?
    """
  #code: 0
  #file: "C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\framework-bundle\Kernel\MicroKernelTrait.php"
  #line: 136
  trace: {
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\framework-bundle\Kernel\MicroKernelTrait.php:136 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\http-kernel\Kernel.php:339 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\http-kernel\Kernel.php:739 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\http-kernel\Kernel.php:120 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\framework-bundle\Console\Application.php:177 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\framework-bundle\Console\Application.php:69 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\console\Application.php:167 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\symfony\runtime\Runner\Symfony\ConsoleApplicationRunner.php:49 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\autoload_runtime.php:29 { …}
    C:\xampp-8-2\htdocs\___final_project_insectopedia\bin\console:15 {
      › \r
      › require_once dirname(__DIR__).'/vendor/autoload_runtime.php';\r
      › \r
      arguments: {
        "C:\xampp-8-2\htdocs\___final_project_insectopedia\vendor\autoload_runtime.php"
      }
    }
  }
}
2024-10-05T15:06:49+02:00 [critical] Uncaught Error: Class "Symfony\WebpackEncoreBundle\WebpackEncoreBundle" not found
```

### Solution :
1) Vérifier l'installation de Webpack Encore Bundle : Tout d'abord, assure-toi que le bundle est bien installé dans ton projet Symfony. Exécute la commande suivante pour installer WebpackEncoreBundle si ce n'est pas déjà fait :
```
composer require symfony/webpack-encore-bundle
```
2) Vérifier le fichier bundles.php : Après l'installation, assure-toi que le fichier config/bundles.php contient bien une ligne similaire à celle-ci :
```
Symfony\WebpackEncoreBundle\WebpackEncoreBundle::class => ['all' => true],
```
3) Compiler les assets si nécessaire : Si tu utilises Webpack pour gérer les assets dans ton projet, compile-les en exécutant la commande suivante :
```
npm install
```

## À la suite d'un npm install
```
C:\xampp-8-2\htdocs\___final_project_insectopedia>npm install
'npm' n’est pas reconnu en tant que commande interne
ou externe, un programme exécutable ou un fichier de commandes.
```

### Solution :
1) Installer Node.js et npm :
- Télécharge Node.js : nodejs.org et télécharge la version LTS (Long Term Support). L'installation de Node.js inclut automatiquement npm.
- Installe Node.js : lance l'installateur et suis les instructions.
2) Vérifier l'installation de npm : 
- Lance un terminal et vérifie que npm est bien installé.
```
npm -v
```
3) Réessayer la commande npm install : 
- Une fois que tout est installé et configuré, retourne dans ton projet et exécute la commande suivante pour installer les dépendances npm
```
npm install
```

## Problème CSS - ne prenait pas en compte un autre fichier css
```
C:\xampp-8-2\htdocs\___final_project_insectopedia>npm run watch

> watch
> encore dev --watch

Running webpack ...

  Error: Duplicate name "app" already exists as an Entrypoint. The entry names between addEntry(), addEntries(), and addStyleEntry() must be unique.

  - WebpackConfig.js:963 WebpackConfig.validateNameIsNewEntry
    [___final_project_insectopedia]/[@symfony]/webpack-encore/lib/WebpackConfig.js:963:19

  - WebpackConfig.js:314 WebpackConfig.addEntry
    [___final_project_insectopedia]/[@symfony]/webpack-encore/lib/WebpackConfig.js:314:14

  - index.js:233 Encore.addEntry
    [___final_project_insectopedia]/[@symfony]/webpack-encore/index.js:233:23

  - EncoreProxy.js:51 Proxy.minDistance
    [___final_project_insectopedia]/[@symfony]/webpack-encore/lib/EncoreProxy.js:51:53

  - webpack.config.js:24 Object.<anonymous>
    C:/xampp-8-2/htdocs/___final_project_insectopedia/webpack.config.js:24:6

  - loader:1469 Module._compile
    node:internal/modules/cjs/loader:1469:14

  - loader:1548 Module._extensions..js
    node:internal/modules/cjs/loader:1548:10

  - loader:1288 Module.load
    node:internal/modules/cjs/loader:1288:32

  - loader:1104 Module._load
    node:internal/modules/cjs/loader:1104:12

  - loader:1311 Module.require
    node:internal/modules/cjs/loader:1311:19

  - helpers:179 require
    node:internal/modules/helpers:179:18

  - webpack-cli.js:204 WebpackCLI.tryRequireThenImport
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:204:22

  - webpack-cli.js:1404 loadConfigByPath
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:1404:38

  - webpack-cli.js:1510 WebpackCLI.loadConfig
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:1510:44

  - webpack-cli.js:1785 WebpackCLI.createCompiler
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:1785:33

  - webpack-cli.js:1890 WebpackCLI.runWebpack
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:1890:31

  - webpack-cli.js:912 Command.<anonymous>
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:912:32

  - index.js:922 Command.listener [as _actionHandler]
    [___final_project_insectopedia]/[commander]/index.js:922:31

  - index.js:1503 Command._parseCommand
    [___final_project_insectopedia]/[commander]/index.js:1503:14

  - index.js:1443 Command._dispatchSubcommand
    [___final_project_insectopedia]/[commander]/index.js:1443:18

  - index.js:1460 Command._parseCommand
    [___final_project_insectopedia]/[commander]/index.js:1460:12

  - index.js:1292 Command.parse
    [___final_project_insectopedia]/[commander]/index.js:1292:10

  - index.js:1318 Command.parseAsync
    [___final_project_insectopedia]/[commander]/index.js:1318:10

  - webpack-cli.js:1372 Command.<anonymous>
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:1372:32

  - task_queues:95 process.processTicksAndRejections
    node:internal/process/task_queues:95:5

  - async Promise.all

  - webpack-cli.js:1376 async WebpackCLI.run
    [___final_project_insectopedia]/[webpack-cli]/lib/webpack-cli.js:1376:9

  - bootstrap.js:9 async runCLI
    [___final_project_insectopedia]/[webpack-cli]/lib/bootstrap.js:9:9
```

### Solution
Après avoir créé un fichier "searchbar.css", celui-ci n'était pas pris en compte.
En ayant suivi les étapes afin d'ajouter un nouvel "entry" dans le fichier "webpack.config.js", j'avais ajouté le bout de code ".addEntry('app', './assets/styles/searchbar.css')", sans avoir changé le "app", qui existait déjà.

J'ai dû suivre les étapes suivantes :
- Allez dans le fichier "webpack.config.js"
- Trouver la ligne "Encore", afin de gérer les "entry points"
- Ajouter, à la ligne, le bout de code ".addEntry('searchbar', './assets/styles/searchbar.css')"