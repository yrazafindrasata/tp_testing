# project_CRM

#### Init

```bash
docker-compose up -d
docker-compose exec --user=application web bash
composer install
php bin/console d:s:u --force
```

#### Run tests
```bash
php bin/phpunit
```
