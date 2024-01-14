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