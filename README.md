# Allo_Deneigement
A full stack website with MVC architechture made with PHP, Boostrap and MariaDB.

![image](https://github.com/Emimint/Allo_Deneigement/assets/90863470/82626599-fb90-4594-8b79-91be5c3bcb34)

## Table of contents

- [Allo_Deneigement](#yelp-camp)
  - [Table of contents](#table-of-contents)
  - [Overview](#overview)
    - [The project](#the-project)
    - [Technical Stack](#technical-stack)
    - [Local installation](#local-installation)
  - [Future plans](#future-plans)
  - [Acknowledgments](#acknowledgments)

## Overview

### The project

Allo_Deneigement is a full-stack web site platform that aims to allow snow removal suppliers to communicate with potential clients. Four types types of users can access the website: suppliers offering, clients searching, admins, and unlogged visitors. With a session created at first with the persisting information of the logged user and specific controllers, each profile can be directed to specific pages. Basic CRUD operators are enabled for each profil, depending on authorization and identification.

#### Screenshots

Login page:

![image](https://github.com/Emimint/Allo_Deneigement/assets/90863470/ca353c1e-39e4-47ef-8d22-0b53a015655a)

Supplier list:

![image](https://github.com/Emimint/Allo_Deneigement/assets/90863470/43a550c5-a72a-4200-ae13-b0145e4797aa)

Client dashboard:

![image](https://github.com/Emimint/Allo_Deneigement/assets/90863470/bcbb35ac-96b0-482e-8607-aafae1ee06d7)


### Technical Stack

Built With

- Frontend
  - JavaScript, 
  - Bootstrap 5
- Backend
  - PHP
- DB
  - MariaDB
- Geolocation
  - Geoapify
  - [Leaflet](https://leafletjs.com/)

### Local installation

1. To run the application locally, it is required to first download the project to your prefered web server (we used Apache [XAMPP](https://www.apachefriends.org/fr/download.html)). With XAMPP, install the app folder in the `htdocs` folder. Once you turn on Apache and MariaDB/MySQL, and set your database credentials (see next step below), the app should be served at `http://localhost/Allo_Deneigement/`.

2. In you prefered SQL database manager, load the database stored in the `database/deneigement_db.sql` file. A database called `deneigement_db` will be created.

3. To link the database to the app, you will need to configure your own `configBD.interface.php`. It needs to be stored in `models/DAO/configs` (`configs` needs to be manually created). Here is the template of the file:

```
<?php

// Don't stage this file, update it with your own credentials

interface ConfigBD
{
	const BD_HOTE = "localhost";
	const BD_UTILISATEUR = "your_database_username";
	const BD_MOT_PASSE = "your_database_username";
	const BD_NOM = "deneigement_db";
}

```

4. You will need to provide your own credentials for the [Geoapify](https://www.geoapify.com/) key used to create new addresses. For that, create a `.env` file at the root of the project:

```
GEO_API_KEY = your-own-geoapify-key

```

With that, you are all set! Run your web server as you need to. `index.php` contains the main controller of the app. 

## Future plans

- Improve UI (pagination, search bar, etc)
- Live deployment
- Add an english translation of the app
- Add admin profile
- Add more secure authentification (hash, salt for passwords) 

## Acknowledgments

- Original project idea by Amine Fahmi

## Contributors

- Fatima Zahra Boudry
- [Cylia Oudiai](https://www.linkedin.com/in/cylia-oudiai-81b7891a0/)
- [Emilie Echevin](https://www.linkedin.com/in/emilie-echevin/)


