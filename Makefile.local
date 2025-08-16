clean:
	php artisan cache:clear
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear
	php artisan optimize:clear

install:
	composer install

deploy: clean
	composer dump-autoload
	php artisan config:cache
	php artisan route:cache
	npm run build

down:
	php artisan down --refresh=15

