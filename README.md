# be-laravel-and-test

# FIXED:
- Set Unit test for even better testing.
- Set migration, if you have already migrated, please re-type 'php artisan migrate'.
- Set seeder user password, trying use 'password' or '123123'

# How to run:

- Enter into the backend folder for laravel setup.

- Run composer install.

- Run php artisan jwt:secret, for add secret key on .env.

- Run php artisan migrate --seed.

- Use the 'Collection Transactions' folder to test the api or to type the 'php artisan test' command to try unit testing.

- Import into postman or thunder client for collection and env API.

- Setup base_url on env API if base url not 127.0.0.1:8000/api.

- Input token on env collection after receive token from login.
