This is a Laravel 5 package that provides review management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/review`.

    "laracart/review": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Review\Providers\ReviewServiceProvider::class,

```

And also add it to alias

```php
'Review'  => Laracart\Review\Facades\Review::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Review\Providers\ReviewServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Review\Providers\ReviewServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Review\Providers\ReviewServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Review\Providers\ReviewServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Review\Providers\ReviewServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Review\Providers\ReviewServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


