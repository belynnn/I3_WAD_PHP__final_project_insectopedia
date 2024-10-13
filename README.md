English below
# TODO
- Modifier "Activité" par "Saisonnalité" dans l'entité Insect
- Ajouter le lien de l'insecte spécifique dans la page des favoris

#### done
- Enlever le type Date de la propriété yearDescribed - Année de description et mettre int ? dans l'entité Insect

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

## Fonctionnalité principale
La fonctionnalité principale est de permettre à un·e utilisateurice d'encoder des observations d'insectes, en partageant différentes informations spécifiques relative à cette observation.

Par exemple, je pars en balade dans un bois, je rencontrer une chenille se baladant sur un tronc, je décide de l'encoder via l'application, en prenant une photo, en remplissant un formulaire et je l'ajoute à mon Pokedex !

### Liste non exhaustive des autres fonctionnalités
   1. Inscription
   2. Connexion / Déconnexion
   3. Recherche
   4. Favoris (insecte & observation)

## Pour commencer
### 1️⃣ Diagrammes
#### 🔶 MCD
Création d'un Modèle de Conception de Données
![insectopedia_MCD](https://raw.githubusercontent.com/belynnn/I3_WAD_PHP__final_project_insectopedia/refs/heads/feature/observation/documentation/MCD.png)
___

#### 🔶 MLD
Création d'un Modèle Logique de Données
![insectopedia_MLD](https://raw.githubusercontent.com/belynnn/I3_WAD_PHP__final_project_insectopedia/refs/heads/feature/observation/documentation/MLD.png)
___

#### 🔶 UML
Création d'un diagramme de classe UML
___

### 2️⃣ Utilisateurices
#### 🔶 Inscription
Pour débuter ce projet, il est primordial d'établir la fonctionnalité d'inscription. Pour cela, l'utilisation de [GIT](https://git-scm.com/) et [Gitflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) est d'une aide précieuse, avec la création d'une branche 'develop', ainsi qu'un flow 'feature/inscription', sur base de la branche 'develop'.

##### 🔸 Il faut pouvoir s'inscrire avec les informations suivantes :
   * un pseudo
   * une adresse mail
   * un mot de passe
   * une image de profil
   
##### 🔸 2 points important sont à prendre en compte :
   * le hash du mot de passe
   * la gestion de l'uuid de l'image de profil

#### 🔶 Connexion / Déconnexion
Une fois l'utilisateurice inscrit·e, celleux pourront avoir accès à leur page de profil privée, afin de pouvoir modifier uniquement leur image de profil. La modification de leur image de profil inclu la suppression de l'ancienne image de profil (à voir si cela est possible).

##### ❇️ Futures améliorations envisageable 
* Hash de l'adresse mail
* Gestion de l'uuid de l'image de profil
* Ajout d'une image de profil
* La possibilité de visiter la page de profil de chaque utilisateurices
* La possibilité de suivre chaque utilisateurices
___

### 3️⃣ Insectes
La fonctionnalité d'insectes a pour but principal d'afficher la liste des insectes dans une page d'insecte et est intimement liée à la barre de recherche, également.
Chaque insecte a sa propre route et permet donc d'afficher une page de l'insecte spécifique, avec ses propres informations.
Les insectes sont présentés en format "card".

#### 🔶 Formulaire d'ajout d'insectes en base de données
Mon premier choix s'était porté sur l'utilisation d'une API, afin de pouvoir recherche l'insecte observé via une source de données externe, histoire de ne pas devoir tout encoder "à la main".
Pour le développement du projet, j'ai décidé de travailler avec peu de données, en encodant quelques insectes grâce à une fixture.
Un formulaire afin d'encoder des insectes est également disponible pour les utilisateurices ayant le tag "ROLE_ADMIN".

##### ❇️ Futures améliorations envisageable 
* Ajouter la possibilité de visualiser la liste en format liste (pas qu'en format "card")
* Ajouter un lien sur la page spécifique de l'insecte indiquant "Afficher les observations"
* Utiliser une API pour ne plus devoir les encoder à la main ou via une fixture
___

### 4️⃣ Barre de recherche
L'un des points principaux du projet est de pouvoir observer des insectes, donc une liste des insectes encodés en base de données est constamment présente.
Pour cela, une requête AJAX a été mis en place directement dans une section recherche, présente dans la barre de navigation.
Il suffit d'écrire par exemple "abe" et les insectes ayant "abe" dans leurs noms s'affichent sous forme de liste.
Les noms sont cliquables, afin de se rendre sur la page de l'insecte sélectionné.

##### ❇️ Futures améliorations envisageable 
* Essayer de supprimer la petite ligne grise qui se trouve tout la barre de recherche
___

### 5️⃣ Observations
##### ❇️ Futures améliorations envisageable 
* 
___
## 💚 Un tout grand merci à
* [DevGirl_](https://www.twitch.tv/devgirl_), de m'avoir donner envie de reprendre des études et de ne rien lâcher !
* [ArcureDev](https://www.twitch.tv/arcuredev), pour son temps, son coaching et son aide précieuse !
* [GuLhe_le_GuJ](https://www.twitch.tv/gulhe_le_guj), pour sa micro-formation GIT et de m'avoir dit "En 25 ans de dev j'ai jamais fais d'UML" quand je bloquais dessus !
* Ronan, pour sa gentillesse et son précieux temps pour m'aider en Symfony !
* Ma compagne et mes 3 chatons d'amours, pour leurs supports inconditionnels !
___
___
___
# [EN] 🐛 Insectopedia - PHP Final Project
Repository containing the development of the final project of the PHP course of the Web Application Developer training, organised by the Interface3 training center in Brussels.

The main aim is to provide access to information about certain insect associations that most people tend to misidentify. For example, beetle larvae and chafer larvae, or European hornets and Asian hornets.

### Main function
The main function is to allow users to enter their insect observations, sharing specific information and up to 3 photos.

### Here is a non-exhaustive list of the other functions
  * Registration
  * Login/Logout
  * Search
