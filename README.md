English below
# [FR] 🐛 Insectopedia - PHP Final Project
Repo contenant l'élaboration du projet final du cours de PHP, de la formation Web Application Develope, organisée par le centre de formation Interface3, à Bruxelles.

Le but principal de cette application est de donner accès à des informations spécifiques concernant des insectes que nous avons tendance à mal identifier. Comme par exemple, pouvoir différencier une larve de cétoine, d'une larve d'hanneton, ou encore de reconnaître un frelon européen, d'un frelon asiatique.

## Outils utilisés
| Frontend                                              | Backend                                                            | Base de données             | Gestion de projet                                  | Autres |
|---|---|---|---|---|
| **Sémantique**                                        | [PHP](https://www.php.net/)                                        | [SQL](https://sql.sh/)      | [GIT](https://git-scm.com/)                        | [Perplexity AI](https://www.perplexity.ai/) |
| [HTML](https://developer.mozilla.org/fr/docs/Web/HTML)| [JavaScript](https://developer.mozilla.org/fr/docs/Web/JavaScript) | **Application web de SGBD** | [Gitflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) | |
| **Style**                                             | [AJAX](https://developer.mozilla.org/fr/docs/Glossary/AJAX)        | [phpmyadmin](https://www.phpmyadmin.net/) | [GitHub](https://github.com/)                                             | |
| [CSS](https://developer.mozilla.org/fr/docs/Web/CSS)  | **Serveur**                                                        | **Système de base de données (SGBD)**     | [Gitmoji](https://gitmoji.dev/)                                           | |
| [Bootstrap](https://getbootstrap.com/)                | [XAMPP](https://www.apachefriends.org/fr/index.html)               | [MySQL](https://www.mysql.com/fr/)        | **MCD / MLD / Diagrammes / ...**                                          | |
| **Design**                                            |                                                                    |                                           | [draw.io](https://app.diagrams.net/)                                      | |
| [Font Awesome](https://fontawesome.com/)              |                                                                    |                                           | [dbdiagram.io](https://dbdiagram.io/home)                                 | |
| [LOGO](https://logo.com/)                             |                                                                    |                                           |                                                                           | |

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

![insectopedia_MCD](https://cdn.discordapp.com/attachments/1262106517859991723/1262130138951192588/insectopedia2.png?ex=669579ca&is=6694284a&hm=c77c428bccf8183a71bc80cad0727f51e600663d573b20813cd7e1dbb70049ee&)

### 2. MLD
Création d'un Modèle Logique de Données

![insectopedia_MLD](https://cdn.discordapp.com/attachments/1262106517859991723/1262148032078676199/insectopedia_MLD.png?ex=66958a74&is=669438f4&hm=3b7c6602330a0b12cc31ab752a5166004f26126e5019823c2776ad15e7ba671d&)

### 3. Fonctionnalité d'inscription
Pour débuter ce projet, il est primordial d'établir la fonctionnalité d'inscription. Pour cela, l'utilisation de [GIT](https://git-scm.com/) et [Gitflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) est d'une aide précieuse, avec la création d'une branche 'develop', ainsi qu'un flow 'feature/inscription', sur base de la branche 'develop'.

Il faut pouvoir s'inscrire avec les informations suivantes
   * un pseudo
   * une adresse mail (même si celle-ci n'est pas vraie)
   * un mot de passe
   * une image de profil
   
2 points important sont à prendre en compte
   * le hash du mot de passe
   * la gestion de l'uuid de l'image de profil

#### Futures améliorations envisageable 
* le hash de l'adresse mail
* l'envoi d'une confirmation de validation par mail avant de pouvoir réellement se connecter

### 4. Fonctionnalité de connexion / déconnexion
Une fois l'utilisateurice inscrit·e, celleux pourront avoir accès à leur page de profil privée, afin de pouvoir modifier uniquement leur image de profil. La modification de leur image de profil inclu la suppression de l'ancienne image de profil (à voir si cela est possible).

#### Futures améliorations envisageable 
* La possibilité de visiter la page de profil de n'importe chaque utilisateurices
* La possibilité de suivre quelconque utilisateurices

### Un tout grand merci à
* [ArcureDev](https://www.twitch.tv/arcuredev), pour son temps, son coaching et son aide précieuse !
* [GuLhe_le_GuJ](https://www.twitch.tv/gulhe_le_guj), pour sa micro-formation GIT qui m'a grandement aidé !
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
