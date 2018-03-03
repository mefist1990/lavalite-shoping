This is a Laravel 5 package that provides product management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/product`.

    "laracart/product": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Product\Providers\ProductServiceProvider::class,

```

And also add it to alias

```php
'Product'  => Laracart\Product\Facades\Product::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Product\Providers\ProductServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Product\Providers\ProductServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Product\Providers\ProductServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Product\Providers\ProductServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Product\Providers\ProductServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Product\Providers\ProductServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


