## BuddySchoolCrawler

Application for crawling BuddySchool site.
Allows to search article and download dumped to text file.

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
$ docker exec -it App-php bash
$ composer install
```

### Launch app
`http://localhost:7779/`
