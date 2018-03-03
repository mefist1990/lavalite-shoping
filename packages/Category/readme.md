This is a Laravel 5 package that provides category management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/category`.

    "laracart/category": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Category\Providers\CategoryServiceProvider::class,

```

And also add it to alias

```php
'Category'  => Laracart\Category\Facades\Category::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Category\Providers\CategoryServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Category\Providers\CategoryServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Category\Providers\CategoryServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Category\Providers\CategoryServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Category\Providers\CategoryServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Category\Providers\CategoryServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


