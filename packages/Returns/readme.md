This is a Laravel 5 package that provides returns management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/returns`.

    "laracart/returns": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Returns\Providers\ReturnsServiceProvider::class,

```

And also add it to alias

```php
'Returns'  => Laracart\Returns\Facades\Returns::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Returns\Providers\ReturnsServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Returns\Providers\ReturnsServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Returns\Providers\ReturnsServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Returns\Providers\ReturnsServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Returns\Providers\ReturnsServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Returns\Providers\ReturnsServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


