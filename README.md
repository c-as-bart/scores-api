## Installation
```shell script
docker-compose up -d
docker exec -it scores-api_php_1 bash
composer install
bin/console doctrine:mongodb:schema:create
```

## Synchronize date from api
```shell script
bin/console back-office:game:results:synchronize
```

## Request resource
```
GET http://localhost:8080/game-result?orderBy=finishedAt
```