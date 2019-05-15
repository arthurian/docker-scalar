Scalar Docker Environment
--------------------------

Ensure that you have [Docker](https://docker.com/) installed.

```
$ cd ~/Development
$ git clone git@github.com:anvc/scalar.git
$ git clone git@github.com:arthurian/docker-scalar.git
$ cd docker-scalar 
$ ln -s ../scalar scalar
$ docker-compose up
$ docker-compose run php /bin/sh -c "cat /var/www/html/system/application/config/scalar_store.sql | mysql --user=scalar --password=scalar --database=scalar_store --host=mysql"
$ docker-compose run php /bin/sh -c "mysql --user=scalar --password=scalar --database=scalar_store --host=mysql -e 'SHOW TABLES'"
```

Navigate to http://localhost:8080 in your browser.
