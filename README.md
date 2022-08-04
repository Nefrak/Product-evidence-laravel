# Product-evidence-laravel
Jedná se o jednoduchou aplikaci s jedním JSON endpointem, který ukládá název produktu do databáze. Pokud dostane hash názvu, tak ho uloží taky, jinak ho vygeneruje v queue. Obsahuje docker-compose.yml. Také obsahuje autorizaci, ale všechny cesty jsou momentálně umístěny mimo, takže není třeba. Pro aktivaci je stačí přesunout v routes/api.php.

## Instalace
Prvně je třeba zavolat 'composer install' pro instalaci balíků.
Potom .env.example změnit na .env.
Zavolat 'php artisan key:generate' pro vygenerování klíče.
Nastavit .env. Hlavně se zaměřit na DB. Například:

- DB_CONNECTION=mysql
- DB_HOST=mariadb
- DB_PORT=3306
- DB_DATABASE=laravel
- DB_USERNAME=sail
- DB_PASSWORD=password

- QUEUE_CONNECTION=database


## Běh
Na začátku se zavolá 'bash ./vendor/laravel/sail/bin/sail up', nebo 'sail up', pokud se nastaví podle dokumentace. Je nutné mít spuštěný docker.
Také je třeba provést migraci při prvním zavolání.
Pro spracování queue je nutné zavolat 'bash ./vendor/laravel/sail/bin/sail artisan queue:work' ('sail artisan queue:work').

## Autor
Jaromír Franěk
