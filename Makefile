.PHONY: up down logs shell db recreate

up:
	docker compose up -d

down:
	docker compose down

logs:
	docker compose logs -f

shell:
	docker compose exec web bash

db:
	docker compose exec db mysql -u user -p codeigniter

recreate:
	docker compose up -d --build --force-recreate

date:
	date +%Y%m%d%H%M%S

# Only for prod
deploy:
	git pull origin main
	docker-compose -f docker-compose.prod.yml up -d --build
	docker-compose -f docker-compose.prod.yml exec web php index.php migrate