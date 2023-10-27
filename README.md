# CSRF reproducer (API backend)

Installation:

1. Clone this repository
2. Copy `.env.example` to `.env`
2. Generate key: `php artisan key:generate`
3. Modify `.env` to match your machine
   4. `APP_URL` should match the URL the backend will be available on, e.g. `APP_URL=http://api.example.test`
   5. `SESSION_DOMAIN` should be the domain, prefixed with a dot, e.g. `SESSION_DOMAIN=".example.test"`
   6. `SANCTUM_STATEFUL_DOMAINS` should list all domains we are using to authenticate using stateful requests, e.g. `SANCTUM_STATEFUL_DOMAINS="web.example.test, .example.test"`
   7. DB-connections: Specify host, user and database names
8. Migrate and seed: `php artisan migrate:fresh --seed`