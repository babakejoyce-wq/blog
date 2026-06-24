# Blog 

Une application de blog moderne développée avec Laravel permettant la gestion des articles, des catégories et des utilisateurs.

## 📖Description

Ce projet est une plateforme de blog construite avec le framework Laravel. Elle permet aux administrateurs de publier des articles, de gérer les catégories et aux visiteurs de consulter le contenu de manière intuitive.

##  Fonctionnalités

- Gestion des articles (Créer, Modifier, Supprimer)
- Gestion des catégories
- Authentification des utilisateurs
- Tableau de bord administrateur
- Affichage des articles récents
- Recherche d'articles
- Interface responsive
- Validation des formulaires
- Gestion des erreurs

##  Technologies utilisées

- Laravel
- PHP
- MySQL
- Blade Template Engine
- HTML5
- CSS3
- JavaScript
- Bootstrap

##  Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- PHP 8.x ou supérieur
- Composer
- MySQL
- Git

##  Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/votre-utilisateur/blog-laravel.git
```

### 2. Accéder au dossier du projet

```bash
cd blog-laravel
```

### 3. Installer les dépendances

```bash
composer install
```

### 4. Copier le fichier d'environnement

```bash
cp .env.example .env
```

### 5. Générer la clé de l'application

```bash
php artisan key:generate
```

### 6. Configurer la base de données

Modifier le fichier `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. Lancer le serveur

```bash
php artisan serve
```

L'application sera accessible à :

```
http://127.0.0.1:8000
```

## 📁 Structure du projet

```text
app/
├── Models
├── Http
database/
├── migrations
resources/
├── views
routes/
├── web.php
public/
```


## 🔒 Sécurité

- Protection CSRF
- Validation des données utilisateur
- Authentification sécurisée
- Gestion des autorisations

##  Contribution

Les contributions sont les bienvenues.

1. Fork du projet
2. Création d'une branche

```bash
git checkout -b feature/nouvelle-fonctionnalite
```

3. Commit des modifications

```bash
git commit -m "Ajout d'une nouvelle fonctionnalité"
```

4. Push vers GitHub

```bash
git push origin feature/nouvelle-fonctionnalite
```

5. Création d'une Pull Request

## 📄 Licence

Ce projet est distribué sous licence MIT.

## 👨‍💻 Auteur

**Joyce Babake**

- GitHub : https://github.com/babakejoyce-wq
- Email : babakejoyce@example.com

---

Développé avec ❤️ en utilisant Laravel.
