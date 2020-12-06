# Informations

Siteweb qui contient la liste de ruche connecté ainsi que leurs données (temperature, humidité, poids...). Ceci est un exercice proposé par Tallyos France

## Installation de la base de donnée

Récuperer le fichier **bdd_ruches_tallyos.sql** puis rendez vous dans phpmyadmin.

Dans l'onglet Import choisir le fichier récuperé. (Image ci-dessous)

![alt text](https://onecomhelp.zendesk.com/hc/article_attachments/115010378189/en_choose-file-to-import.png)

## Configuration du fichier /api/connectionBdd.php

Si vous utilisez Wamp vous pouvez passer cette partie.

Par contre si vous utilisez un autre serveur web (Xampp, Uwamp...) vous devez changer les parametres de connexion à la base de donnée.

Rendez vous dans le dossier **api** puis le fichier **connectionBdd.php**

```php
$user = "root";
$password = "";
$host = "localhost";
$db_name = "bdd_ruches_tallyos";
```

Changer les données ci-dessus pour faire fonctionner la base de donnée.

## Installer le site

Récuperer le code sur github. Démarrer votre serveur web et placer le dossier du site dans le dossier WWW du serveur web. (Image ci-dessous avec Wamp)

![alt text](https://lh3.googleusercontent.com/proxy/q_tFv5zkbOZ3RwqH9546rcVV20JLaoClU5R9brsL8JXrojnp_Btx2W-tn9MJuq2vGcWue0YszxkJQ3_2LB0SQv5jkECBJBn5CaUu4_AhGvXhPfi3B3hnszkLv31YFwK3rstG-I-Gvg)

Le site devrait fonctionner. Enjoy :)

## Framework

Site crée avec Bootstrap v4.5.3

Jquery v3.5.1 est utilisé

## Auteurs

Mathieu H. 

[Voir mon site web](https://portfolio.harmant-mathieu.fr/)