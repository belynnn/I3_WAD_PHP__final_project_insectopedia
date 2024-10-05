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