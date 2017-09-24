# eypconf
eypconf - elarge your puppet configuration

## notes

* validació index uniq - https://laravel.io/forum/03-11-2014-validation-unique-to-user
* gestió errors - https://scotch.io/tutorials/laravel-form-validation

## install

* dependencies:
  * php7.0-mbstring
  * php7.0-xml
  * php7.0-curl
* Install Composer on your OS using this command curl -sS https://getcomposer.org/installer | php.
* Move the composer.phar file to /usr/local/bin/ with this command mv composer.phar /usr/local/bin/composer. This will enable you to access composer globally.
* git clone your project.
* Make a vendors folder in the root of your project.
* cd to root of your project and run composer update. This command will look for vendors folder in the root and will install all the packages required by your project in it.
* touch storage/logs/laravel.log; chown www-data storage/logs/laravel.log; chmod 666 storage/logs/laravel.log
* chown www-data storage -R
* chmod 777 bootstrap/cache/
* php artisan key:generate
* php artisan config:clear
* php artisan migrate:refresh
