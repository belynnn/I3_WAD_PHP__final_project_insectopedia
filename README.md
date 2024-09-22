English below
# TODO
- Supprimer les fichiers obsolètes (index.php par ex.)

# [FR] 🐛 Insectopedia - PHP Final Project
Repo contenant l'élaboration du projet final du cours de PHP, de la formation Web Application Develope, organisée par le centre de formation Interface3, à Bruxelles.

Le but principal de cette application est de donner accès à des informations spécifiques concernant des insectes que nous avons tendance à mal identifier. Comme par exemple, pouvoir différencier une larve de cétoine, d'une larve d'hanneton, ou encore de reconnaître un frelon européen, d'un frelon asiatique.

## Outils utilisés
| Frontend | Backend | Base de données | Gestion de projet | Autres |
|---|---|---|---|---|
| **Sémantique** | [PHP](https://www.php.net/) | [SQL](https://sql.sh/) | [GIT](https://git-scm.com/) | [Perplexity AI](https://www.perplexity.ai/) |
| [HTML](https://developer.mozilla.org/fr/docs/Web/HTML) | [JavaScript](https://developer.mozilla.org/fr/docs/Web/JavaScript) | **Application web de SGBD** | [Gitflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) | [Excalidraw](https://excalidraw.com/) |
| **Style** | [AJAX](https://developer.mozilla.org/fr/docs/Glossary/AJAX) | [phpmyadmin](https://www.phpmyadmin.net/) | [GitHub](https://github.com/) | |
| [CSS](https://developer.mozilla.org/fr/docs/Web/CSS) | **Serveur** | **Système de base de données (SGBD)** | [Gitmoji](https://gitmoji.dev/) | |
| [Bootstrap](https://getbootstrap.com/) | [XAMPP](https://www.apachefriends.org/fr/index.html) | [MySQL](https://www.mysql.com/fr/) | **MCD / MLD / Diagrammes / ...** | |
| **Design** | | | [draw.io](https://app.diagrams.net/) | |
| [Font Awesome](https://fontawesome.com/) | | | [dbdiagram.io](https://dbdiagram.io/home) | |
| [LOGO](https://logo.com/) | | | | |

### Fonctionnalité principale
La fonctionnalité principale est de permettre à un·e utilisateurice d'encoder des observations, en partageant différentes informations spécifiques relative à une observation, ainsi que, si l'utilisateurice le souhaite, ajouter 3 photos maximum.

### Liste non exhaustive des autres fonctionnalités
   1. Inscription
   2. Connexion / Déconnexion
   3. Recherche
   4. Notification

## Pour commencer
### 1. MCD
Création d'un Modèle de Conception de Données

![insectopedia_MCD](https://cdn.discordapp.com/attachments/1262106517859991723/1262430295488204820/MCD.png?ex=66969155&is=66953fd5&hm=5b3f7b6795e1091db8e1f1d836bbb48d5af3505c73eec73c8ea71595bdeeebcc&)

### 2. MLD
Création d'un Modèle Logique de Données

![insectopedia_MLD](https://cdn.discordapp.com/attachments/1262106517859991723/1262430295731212318/MLD.png?ex=66969155&is=66953fd5&hm=a72c5ae8160d059f23c246319647a115bd2a28e1f57a0ffd8dc9ac8701aff797&)

### 3. Fonctionnalité d'inscription
Pour débuter ce projet, il est primordial d'établir la fonctionnalité d'inscription. Pour cela, l'utilisation de [GIT](https://git-scm.com/) et [Gitflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) est d'une aide précieuse, avec la création d'une branche 'develop', ainsi qu'un flow 'feature/inscription', sur base de la branche 'develop'.

Il faut pouvoir s'inscrire avec les informations suivantes
   * un pseudo
   * une adresse mail (même si celle-ci n'est pas vraie)
   * un mot de passe
   * une image de profil (todo)
   
2 points important sont à prendre en compte
   * le hash du mot de passe
   * la gestion de l'uuid de l'image de profil (todo)

#### Futures améliorations envisageable 
* le hash de l'adresse mail
* l'envoi d'une confirmation de validation par mail avant de pouvoir réellement se connecter

### 4. Fonctionnalité de connexion / déconnexion
Une fois l'utilisateurice inscrit·e, celleux pourront avoir accès à leur page de profil privée, afin de pouvoir modifier uniquement leur image de profil. La modification de leur image de profil inclu la suppression de l'ancienne image de profil (à voir si cela est possible).

#### Futures améliorations envisageable 
* La possibilité de visiter la page de profil de n'importe chaque utilisateurices
* La possibilité de suivre quelconque utilisateurices

### 5. Liste d'insectes et pages des insectes
L'un des points principaux du projet est de pouvoir observer des insectes, donc une liste des insectes encodés en base de données sera constamment présente pour n'importe quel type d'utilisateurice. Pour l'instant, il s'agit d'un simple lien directement dans la navbar.

#### Futures améliorations envisageable 
* Créer une recherche AJAX permettant de chercher des insectes via seulement une partie du nom, en plus du lien dans la navbar

### 6. Formulaire pour ajouter des insectes en base de données
Mon premier choix s'était porté sur l'utilisation d'une API, afin de pouvoir recherche l'insecte observé via une source de données externe, histoire de ne pas devoir tout encoder "à la main", mais pour le développement du projet, je vais faire en sorte de travailler avec peu de données, en encodant seulement 10 insectes. Pour cela, j'ai besoin d'un formulaire me permettant de les encoder.
Ce formulaire sera uniquement disponible aux administateurices du site et donc ne devra pas être disponible pour les visiteureuses et utilisateurices simples.

#### Futures améliorations envisageable 
* Utiliser une API pour ne plus devoir les encoder à la main

### Un tout grand merci à
* [ArcureDev](https://www.twitch.tv/arcuredev), pour son temps, son coaching et son aide précieuse !
* [GuLhe_le_GuJ](https://www.twitch.tv/gulhe_le_guj), pour sa micro-formation GIT qui m'a grandement aidé !
* Ronan, pour sa gentillesse et son précieux temps pour m'aider en Symfony !
* Ma compagne et mes 3 chatons d'amours, pour leurs supports inconditionnels !
___
___
___
# [EN] 🐛 Insectopedia - PHP Final Project
Repository containing the development of the final project of the PHP course of the Web Application Developer training, organised by the Interface3 training centre in Brussels.

The main aim is to provide access to information about certain insect associations that most people tend to misidentify. For example, beetle larvae and chafer larvae, or European hornets and Asian hornets.

### Main function
The main function is to allow users to enter their insect observations, sharing specific information and up to 3 photos.

### Here is a non-exhaustive list of the other functions
  * Registration
  * Login/Logout
  * Search
