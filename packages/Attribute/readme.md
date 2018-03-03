This is a Laravel 5 package that provides attribute management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/attribute`.

    "laracart/attribute": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Attribute\Providers\AttributeServiceProvider::class,

```

And also add it to alias

```php
'Attribute'  => Laracart\Attribute\Facades\Attribute::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Attribute\Providers\AttributeServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Attribute\Providers\AttributeServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Attribute\Providers\AttributeServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Attribute\Providers\AttributeServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Attribute\Providers\AttributeServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Attribute\Providers\AttributeServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


