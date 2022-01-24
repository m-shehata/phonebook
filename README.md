# Phonebook

#### Built using Laravel Framework


## System requirements
- php: ^8.0"

## Run the application
- Copy `.env.example` to `.env` file in project root directory.
```sh
cp .env.example .env
```
- Set appropriate permissions for Laravel to be able to write logs, etc. You can set it to 777 for local development:
```sh
sudo chmod -R 777 ./storage
sudo chmod -R 777 ./bootstrap/cache/
```
- Install project dependencies
```sh
composer install
```
- Host the project or simply run local php server. You may use Laravel artisan to do so:
```sh
php artisan serve
```
- Visit the application. If using Artisan it will be hosted on port `8000` accessible from [localhost:8000](http://localhost:8000)

## Testing
Run
```sh
php artisan test
```
Included sample of unit testing for
- valid phone for country cameroon
- valid phone for country ethiopia
- valid phone for country morocco
- valid phone for country mozambique
- valid phone for country uganda
- invalid phone for country uganda

Included sample feature testing for customer list
- page open
- page open with country param
- page open with state param
- page open with country and state param
- page redirect with wrong country param
- page redirect with wrong state param
- **customer list only contain selected country cameroon**
- **customer list only contain selected valid phone status**
- **customer list only contain selected invalid phone status**