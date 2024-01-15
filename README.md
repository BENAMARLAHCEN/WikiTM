## WikiTM
## Installation and Usage

Follow these steps to install and use this repository:

1. **Clone the repository**

   First, clone the repository to your local machine:

```bash
   git clone https://github.com/lahsenbenamar/WikiTM
```
2. Install dependencies

This project uses Composer to manage dependencies. To install the dependencies, navigate to the project directory and run:
```bash
composer install
```
This command will install all the dependencies defined in the composer.json file.


## Project Structure:

```
.
|-- app
| |-- config
| | |-- Config.php
| |-- Controller
| | |-- Controller.php
| | |-- AuthController.php
| | |-- CategoryController.php
| | |-- DashController.php
| | |-- FilterController.php
| | |-- HomeController.php
| | |-- ProfileController.php
| | |-- TagController.php
| | |-- WikiController.php
| |-- core
| | |-- Helper.php
| | |-- Session.php
| | |-- Validation.php
| |-- Database
| | |-- Connection.php
| |-- Middleware
| | |-- IsAdmin.php
| | |-- IsAuthor.php
| | |-- IsGuest.php
| | |-- Middleware.php
| |-- Model
| | |-- Model.php
| | |-- Category.php
| | |-- Tag.php
| | |-- User.php
| | |-- Wiki.php
| |-- Router
| | |-- index.php
| |-- Controller.php
| |-- Router.php
|-- public
| |-- assets
| | |-- css
| | |-- img
| | |-- js
| | |-- upload
| |-- .htaccess
| |-- index.php
|-- vendor
|-- View
|-- .env
|-- .env.example
|-- .gitignore
|-- .htaccess
|-- composer.json
```

## Explain important files
### Connection.php
This Connection class is responsible for managing the connection to a database. Here's a brief explanation of each class method:

- __construct: This method is the constructor for the class. It initializes the private properties $dbname, $host, $username, and $password with the provided values.

- getInstance: This method retrieves the singleton instance of the Connection class. It takes the same parameters as the constructor and creates a new instance if it doesn't exist.

- getPDO: This method retrieves the PDO object for the database connection. It returns the existing $pdo property if it exists, or creates a new PDO object using the stored database credentials.


### Controller.php
This class is an abstract base controller that provides some common functionality for other controllers in the application.

- The view method renders a view by including a specified PHP file and passing optional parameters.


### Model.php
This class is an abstract model that provides basic CRUD (Create, Read, Update, Delete) functionality for interacting with a database table. Here's a summary of each class method:

- **Constructeur (`__construct`) :**
  - Initialise la classe avec une connexion PDO à la base de données.

- **Sélectionner des enregistrements (`selectRecords`) :**
  - Récupère des enregistrements de la table avec des conditions, un tri, un regroupement et une jointure facultatifs.

- **Insérer un enregistrement (`insertRecord`) :**
  - Insère un nouvel enregistrement dans la table de la base de données.

- **Mettre à jour un enregistrement (`updateRecord`) :**
  - Met à jour un enregistrement existant dans la table de la base de données.

- **Supprimer un enregistrement (`deleteRecord`) :**
  - Supprime un enregistrement de la table de la base de données en fonction de son ID.

- **Obtenir le dernier ID inséré (`getlastInsertedId`) :**
  - Retourne le dernier ID inséré depuis la base de données.

- **Journaliser les erreurs (`logError`) :**
  - Journalise les erreurs (PDOException) dans un fichier.

- **Journaliser les requêtes (`logQuery`) :**
  - Journalise les requêtes SQL dans un fichier.

Cette classe modèle abstraite fournit une base pour d'autres classes modèle spécifiques à votre application, leur permettant d'hériter et d'étendre ces fonctionnalités CRUD de base.

**Routeur avec Middleware - Résumé de l'Explication :**

1. **Classe Router (`Router.php`) :**
   - Gère les routes et répartit les requêtes vers les contrôleurs appropriés.
   - Définit des routes pour les méthodes GET et POST.
   - Utilise une méthode `dispatch` pour faire correspondre l'URI demandée à une route définie et exécuter l'action associée du contrôleur.
   - Inclut une fonction `abort` pour gérer les erreurs HTTP.

2. **Classe Middleware (`Middleware.php`) :**
   - Contient une correspondance (`MAP`) entre les clés de middleware et leurs classes correspondantes.
   - Fournit une méthode `resolve` pour exécuter le middleware en fonction d'une clé donnée.
   - Lève une exception s'il n'y a pas de middleware correspondant à une clé donnée.

3. **Classes Middleware (`IsAdmin.php`, `IsAuthor.php`, `IsGuest.php`) :**
   - Implémentent une logique de middleware spécifique pour différentes situations (par exemple, vérifier si l'utilisateur est un administrateur, un auteur ou un invité).
   - Chaque classe de middleware a une méthode `handle` où la logique spécifique au middleware est exécutée.

4. **Utilisation dans le Routeur :**
   - Le middleware est appliqué dans la méthode `dispatch` de la classe `Router`.
   - Lorsqu'une route est correspondante, le middleware associé est résolu et exécuté avant l'action du contrôleur.
   - Le middleware permet d'effectuer des actions telles que l'authentification, l'autorisation ou toute logique de pré/post-traitement.

5. **Exemple :**
   ```php
   // Dans la configuration du Routeur
   $router = new Router();
   $router->get('/tableau-de-bord', 'ControleurTableauDeBord', 'index', 'admin');
   $router->dispatch();
   ```
   Dans cet exemple, le middleware 'admin' (classe `IsAdmin`) est exécuté avant l'action `index` du `ControleurTableauDeBord`.

6. **Avantages :**
   - Le middleware permet un code modulaire et réutilisable pour des tâches telles que l'authentification et l'autorisation.
   - Permet l'exécution d'une logique spécifique avant ou après d'atteindre le contrôleur.
   - Favorise la séparation des préoccupations en isolant différentes aspects du traitement des requêtes.

7. **Considérations :**
   - Les clés de middleware dans les routes doivent correspondre à celles définies dans la classe `Middleware`.
   - La logique du middleware peut être étendue pour couvrir une large gamme de scénarios, améliorant ainsi l'organisation et la lisibilité du code.

