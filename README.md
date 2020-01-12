# Pour l'installation (dans l'ordre) :
```
- cp .env.example .env
- php artisan key:generate
- php artisan optimize
- composer install
```

# Pour démarrer le site : 
```
- php artisan serve
```

#Pour créer la DB et les jeux de tests : 
```
- Créer une database nommée "laravel"
- php artisan migrate:fresh --seed
- php artisan passport:install --force
```

# Surtout jamais de :
```
- composer update
```

# Autre (explications à venir) :
```
- composer dump-autoload
```
