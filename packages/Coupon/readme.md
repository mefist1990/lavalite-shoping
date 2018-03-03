This is a Laravel 5 package that provides coupon management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `laracart/coupon`.

    "laracart/coupon": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Laracart\Coupon\Providers\CouponServiceProvider::class,

```

And also add it to alias

```php
'Coupon'  => Laracart\Coupon\Facades\Coupon::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Laracart\Coupon\Providers\CouponServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Laracart\Coupon\Providers\CouponServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Laracart\Coupon\Providers\CouponServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Laracart\Coupon\Providers\CouponServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Laracart\Coupon\Providers\CouponServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Laracart\Coupon\Providers\CouponServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


