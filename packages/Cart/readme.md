This is a Laravel 5 package that provides cart management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/cart`.

    "laracart/cart": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Cart\Providers\CartServiceProvider::class,

```

And also add it to alias

```php
'Cart'  => Laracart\Cart\Facades\Cart::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Cart\Providers\CartServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Cart\Providers\CartServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Cart\Providers\CartServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Cart\Providers\CartServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Cart\Providers\CartServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Cart\Providers\CartServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


