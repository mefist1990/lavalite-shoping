This is a Laravel 5 package that provides filter management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/filter`.

    "laracart/filter": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Filter\Providers\FilterServiceProvider::class,

```

And also add it to alias

```php
'Filter'  => Laracart\Filter\Facades\Filter::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Filter\Providers\FilterServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Filter\Providers\FilterServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Filter\Providers\FilterServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Filter\Providers\FilterServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Filter\Providers\FilterServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Filter\Providers\FilterServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


