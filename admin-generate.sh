#!/bin/bash

TABLE_NAME="$1"

php artisan admin:generate:controller $TABLE_NAME &&
php artisan admin:generate:index $TABLE_NAME &&
php artisan admin:generate:form $TABLE_NAME &&
php artisan admin:generate:factory $TABLE_NAME &&
php artisan admin:generate:routes $TABLE_NAME &&
php artisan admin:generate:request:index $TABLE_NAME &&
php artisan admin:generate:request:store $TABLE_NAME &&
php artisan admin:generate:request:update $TABLE_NAME &&
php artisan admin:generate:request:destroy $TABLE_NAME &&
php artisan admin:generate:permissions $TABLE_NAME &&
php artisan migrate &&
npm run production
