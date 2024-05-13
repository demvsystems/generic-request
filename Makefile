DOCKER_PHP_SERVICE = php-fpm

.PHONY: composer-install composer-update test new up kill

composer-install:
	docker-compose exec $(DOCKER_PHP_SERVICE) composer install --optimize-autoloader

composer-update:
	docker-compose exec $(DOCKER_PHP_SERVICE) composer update

test:
	docker-compose exec $(DOCKER_PHP_SERVICE) composer test

new: kill
	docker-compose up -d --build --remove-orphans
	make docker-composer-install

up:
	docker-compose up -d

kill:
	docker-compose kill
	docker-compose down --volumes --remove-orphans
