This is a Laravel 5 package that provides newsletter management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/newsletter`.

    "litecms/newsletter": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Litecms\Newsletter\Providers\NewsletterServiceProvider::class,

```

And also add it to alias

```php
'Newsletter'  => Litecms\Newsletter\Facades\Newsletter::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Litecms\Newsletter\Providers\NewsletterServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Litecms\Newsletter\Providers\NewsletterServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Litecms\Newsletter\Providers\NewsletterServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Newsletter\Providers\NewsletterServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Litecms\Newsletter\Providers\NewsletterServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Litecms\Newsletter\Providers\NewsletterServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


