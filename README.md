```shell
# RUN DOCKER INITIALIZATION

$ cd docker
$ docker-compose up --build

# RUN php cs fixes
$ docker-compose exec console_app composer fix

# RUN php stan analyse
$ docker-compose exec console_app composer analyse

# RUN php unit tests
$ docker-compose exec console_app bin/phpunit tests/

# To test composite generators and converters
$ bin/console app:gen-con:process
```
