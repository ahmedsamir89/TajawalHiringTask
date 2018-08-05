build:
	docker-compose build
up:
	docker-compose up -d
stop:
	docker-compose stop
test:
	docker-compose exec php-fpm ./vendor/bin/phpunit
down:
	docker-compose down
install:
	docker-compose exec php-fpm composer install
permission:
	docker-compose exec php-fpm chmod 777 -R storage/

init: build up install permission