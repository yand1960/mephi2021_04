start:
	docker-compose up -d  --scale db_init=0 --scale db_clean=0 --scale nginx=0 --scale frontend=0
stop:
	docker-compose down
production:
	docker-compose up -d --scale db_init=0 --scale db_clean=0
build:
	docker-compose build
	docker image prune -f
	docker-compose down
db:
	docker-compose up -d db_init
db-clean:
	docker-compose up -d db_clean

clean:
	docker rm $(docker ps -q -a)
	docker rmi $(docker images -q -a)
	docker volume prune -y
