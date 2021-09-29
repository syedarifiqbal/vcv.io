<p align="center"><a href="https://cloudprimero.com" target="_blank"><img src="https://cloudprimero.com/wp-content/uploads/2021/07/logo-300x78.png" width="400"></a></p>

<p align="center">
<a href="https://cdn1.vectorstock.com/i/1000x1000/13/15/assignment-round-isolated-gold-badge-vector-16241315.jpg"><img src="https://cdn1.vectorstock.com/i/1000x1000/13/15/assignment-round-isolated-gold-badge-vector-16241315.jpg" alt="Build Status" width="100"></a>
</p>

## Project Installation

Just clone the repository and run the following comment, and you should be good to go.

```angular2html
cd product directory
cp .env.example .env
composer install --no-dev
php artisan key:generate
npm install && npm run dev
php artisan migrate --seed
or php artisan migrate:refresh --seed
php artisan serve --port=9000
```

Visit http://localhost:9000

you can register new user if you want or use any or the created by seeder with the simple password as `password`

OR

Visit http://localhost:9000/admin/login

## For Admin User

You can use the following credentials
`arifiqbal@outlook.com` and password is `password`

###Note:
Please not you don't need to create and change credentials or database because i have used SQLite for this demo project.

Extension required for the app to run is ``PDO_SQLITE``
