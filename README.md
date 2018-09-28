# Contact App

Simple page pour gérer ses contacts

```sh
#composer
composer install
#npm
npm install
```

Ensuite, migrer modifier le **.env** a votre convenance.

Migration de la base de donnée:

```sh
php artisan migrate
#Seeds
php artisan db:seed --class=UsersTableSeeder
```

Enfin, lancez l'application

```sh
php artisan serve --port=8080
```

Ouvrez l'application sur http://localhost:8080/login

Pour vous connecter, utiliser test@test.fr avec le mdp *test* .

## TO DO

* Intégrer les addresses en Many to One contact
* Permettre la création et la mise a jour des adresses en meme temps que le contact
* Checker si l'utilisateur n'a pas entré de doublons
