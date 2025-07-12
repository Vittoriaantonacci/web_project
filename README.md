[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#recipeek)

# ➤ Recipeek

[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#Be-fit-Be-Social!)

## ➤ Be fit, be social!

**Recipeek** is a web applicaton that merges a social network with your best hub to your feeding experience.

In our application, there are different types of users:
- **BASIC PROFILE**: This user can visualisze and create non-sub addressed posts, recipes, and meal plans. He can do all social-network basic action, for instance like a post, save a creation or follow other accounts. It requires only a registration process.
- **SUBSCRIBED**: This user can purchase a subscription to have access to exclusive content, to create posts, recipes, and meal plans addressed only to subbed users using subs-only categories marked by #FIT.

For the administration point of view, this application is granted by:
- **MOD**: Users directly choosen by admin that is able to manage all type of published content, including remove unappropriate ones.
- **ADMIN**: The Admin is the all-mighty user. He can manage every aspects of the website and can elects mods.



[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#-installation-guide)

## ➤ 🚀 Installation Guide

This web app needs this requirements:

- PHP (version 8.2 or higher)
- A web server (e.g. Apache)
- A relational DBMS (e.g. MariaDB or MySql)
- Composer (for "composer include")

***Note:*** xampp includes php, web server and MySql, but having php on your device added to PATH is recommended. <br>
To install compose, follow the easy to use guide on official website: <br>
https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos


### 1. Download source code
Download the source code by github repository, it will download a zip file.

Extract all the folder files into the document root of your server (e.g.: xampp/htdocs if you are using xampp)

### 2. Dependencies installation

Open your terminal in the document root folder and run:

```bash
composer install
```

It will include all dependencies, following composer.json version declaration.

### 3. Database Configuration

Edit the database settings in the following file:
```
/recipeek/config/config.php
```
Be sure to set your host, database name, username, and password properly.

### 4. API Authentication
This web application uses Fat Secret API to retrieve food serving datas and informations. To make API call works you should follow this steps:
- Make an account on FatSecret API platform: https://platform.fatsecret.com/platform-api
- Follow steps to generate an API key
- Place your keys on /config/config.php (better solution: place it in a your own file .env)
- Whitelist you IP address on FatSecret dedicated section.

### 5. Enjoy the application!

Open your favourite browser and enter the URI 

```
localhost/recipeek
```

***Watch out!*** Make sure that the folder in your document root of your server which contains the project is named "recipeek".


### Extra:   for local server

Using a local server (for instance, localhost) requires quite more steps:

- Comment lines 21-22-23 of the file '.htaccess' to turn off https redirect: some browsers gave unhandled certificate error. If you want https anyway, you should consent "Proceed Anyway" on browser settings;

- If you have unix like OS (linux, macOS...) grant Apache permission to read and write in the following directories: 
    - /recipeek/var/proxies  (if not exists create it)
    - /recipeek/smarty/libs/template_c
    - /recipeek/public/default
    - /recipeek/public/uploads/* (all folders in uploads)

To do that, open terminal on each of this folder and type:

```bash
sudo chmod -R 755 $(pwd)
```


[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#-notes)

## ➤ 📝 Notes

This project is for academic purposes and not intended for production use.
Contributions and feedback are welcome.




[![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/colored.png)](#-author)

## ➤ 👨🏻‍💻 Author

Samuele – Engineering student <br>
Vittoria – Engineering student <br>
Marzia – Engineering student