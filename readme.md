## Allegro API Wrapper

TODO: description

### Technology stack
* PHP: 7.2.*
* Laravel 5.6
* Docker
* PHPUnit 7.0.2

#### Continous Integration
* Travis

### Docker build

##### First start
`$ docker-compose up -d --build`

##### Start
```
$ docker-compose up -d
$ docker exec -it allegro-api-php bash
$ composer install
```

### Launch app
`http://localhost:7779/`
