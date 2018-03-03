This is a Laravel 5 package that provides order management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/order`.

    "laracart/order": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Order\Providers\OrderServiceProvider::class,

```

And also add it to alias

```php
'Order'  => Laracart\Order\Facades\Order::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Order\Providers\OrderServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Order\Providers\OrderServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Order\Providers\OrderServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Order\Providers\OrderServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Order\Providers\OrderServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Order\Providers\OrderServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


