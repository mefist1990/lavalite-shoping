This is a Laravel 5 package that provides currency management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/currency`.

    "laracart/currency": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Currency\Providers\CurrencyServiceProvider::class,

```

And also add it to alias

```php
'Currency'  => Laracart\Currency\Facades\Currency::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Currency\Providers\CurrencyServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Currency\Providers\CurrencyServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Currency\Providers\CurrencyServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Currency\Providers\CurrencyServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Currency\Providers\CurrencyServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Currency\Providers\CurrencyServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


