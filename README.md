# Product-evidence-laravel
Jedná se o jednoduchou aplikaci s jedním JSON endpointem, který ukládá název produktu do databáze. Pokud dostane hash názvu, tak ho uloží taky, jinak ho vygeneruje v queue. Obsahuje docker-compose.yml. Také obsahuje autorizaci, ale všechny cesty jsou momentálně umístěny mimo, takže není třeba. Pro aktivaci je stačí přesunout v routes/api.php.

## Instalace
Prvně je třeba zavolat 'npm install' pro instalaci balíků.

## Běh
Na začátku se zavolá 'bash ./vendor/laravel/sail/bin/sail up', nebo 'sail up', pokud se nastaví podle dokumentace. Je nutné mít spuštěný docker.
Také je třeba provést migraci při prvním zavolání.
Pro spracování queue je nutné zavolat 'bash ./vendor/laravel/sail/bin/sail artisan queue:work' ('sail artisan queue:work').

## Autor
Jaromír Franěk
