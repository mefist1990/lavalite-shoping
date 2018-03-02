<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
     */

    'name'            => 'My Application',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
     */

    'env'             => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
     */

    'debug'           => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
     */

    'url'             => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
     */

    'timezone'        => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
     */

    'locale'          => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
     */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
     */

    'key'             => env('APP_KEY'),

    'cipher'          => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
     */

    'log'             => env('APP_LOG', 'single'),

    'log_level'       => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
     */

    'providers'       => [

        Ignited\LaravelOmnipay\LaravelOmnipayServiceProvider::class,

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        // Gloudemans\Shoppingcart\ShoppingcartServiceProvider::class,
        //
            
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        /*
         * Lavalite Framework Service Providers...
         */
        Litepie\Block\BlockServiceProvider::class,
        Litepie\Calendar\CalendarServiceProvider::class,
        Litepie\Contact\ContactServiceProvider::class,
        Litepie\Filer\FilerServiceProvider::class,
        Litepie\Form\FormServiceProvider::class,
        Litepie\Hashids\HashidsServiceProvider::class,
        Litepie\Menu\MenuServiceProvider::class,
        Litepie\Message\MessageServiceProvider::class,
        Litepie\News\NewsServiceProvider::class,
        Litepie\Page\PageServiceProvider::class,
        Litepie\Revision\RevisionServiceProvider::class,
        Litepie\Settings\SettingsServiceProvider::class,
        Litepie\Task\TaskServiceProvider::class,
        Litepie\Theme\ThemeServiceProvider::class,
        Litepie\Trans\TransServiceProvider::class,
        Litepie\User\UserServiceProvider::class,
        Litepie\Workflow\WorkflowServiceProvider::class,

        Laracart\Attribute\Providers\AttributeServiceProvider::class,
        Laracart\Category\Providers\CategoryServiceProvider::class,
        Laracart\Filter\Providers\FilterServiceProvider::class,
        Laracart\Product\Providers\ProductServiceProvider::class,
        Laracart\Review\Providers\ReviewServiceProvider::class,
        Laracart\Cart\Providers\CartServiceProvider::class,
        Laracart\Coupon\Providers\CouponServiceProvider::class,
        Laracart\Order\Providers\OrderServiceProvider::class,
        Laracart\Currency\Providers\CurrencyServiceProvider::class,
        Laracart\Returns\Providers\ReturnsServiceProvider::class,
        
       

        /*
         * Cms package Service Providers...
         */
        Litecms\Blog\Providers\BlogServiceProvider::class,
        Litecms\Newsletter\Providers\NewsletterServiceProvider::class,
        // Litecms\Career\Providers\CareerServiceProvider::class,
        // Litecms\Faq\Providers\FaqServiceProvider::class,
        // Litecms\Forum\Providers\ForumServiceProvider::class,
        // Litecms\Gallery\Providers\GalleryServiceProvider::class,
        // Litecms\Portfolio\Providers\PortfolioServiceProvider::class,
        // Litecms\PriceList\Providers\PriceListServiceProvider::class,
        // Litecms\Team\Providers\TeamServiceProvider::class,
        // Litecms\Testimonial\Providers\TestimonialServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
     */

    'aliases'         => [

        'Omnipay' => Ignited\LaravelOmnipay\Facades\OmnipayFacade::class,
        'App'          => Illuminate\Support\Facades\App::class,
        'Artisan'      => Illuminate\Support\Facades\Artisan::class,
        'Auth'         => Illuminate\Support\Facades\Auth::class,
        'Blade'        => Illuminate\Support\Facades\Blade::class,
        'Cache'        => Illuminate\Support\Facades\Cache::class,
        'Config'       => Illuminate\Support\Facades\Config::class,
        'Cookie'       => Illuminate\Support\Facades\Cookie::class,
        'Crypt'        => Illuminate\Support\Facades\Crypt::class,
        'DB'           => Illuminate\Support\Facades\DB::class,
        'Eloquent'     => Illuminate\Database\Eloquent\Model::class,
        'Event'        => Illuminate\Support\Facades\Event::class,
        'File'         => Illuminate\Support\Facades\File::class,
        'Gate'         => Illuminate\Support\Facades\Gate::class,
        'Hash'         => Illuminate\Support\Facades\Hash::class,
        'Lang'         => Illuminate\Support\Facades\Lang::class,
        'Log'          => Illuminate\Support\Facades\Log::class,
        'Mail'         => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password'     => Illuminate\Support\Facades\Password::class,
        'Queue'        => Illuminate\Support\Facades\Queue::class,
        'Redirect'     => Illuminate\Support\Facades\Redirect::class,
        'Redis'        => Illuminate\Support\Facades\Redis::class,
        'Request'      => Illuminate\Support\Facades\Request::class,
        'Response'     => Illuminate\Support\Facades\Response::class,
        'Route'        => Illuminate\Support\Facades\Route::class,
        'Schema'       => Illuminate\Support\Facades\Schema::class,
        'Session'      => Illuminate\Support\Facades\Session::class,
        'Storage'      => Illuminate\Support\Facades\Storage::class,
        'URL'          => Illuminate\Support\Facades\URL::class,
        'Validator'    => Illuminate\Support\Facades\Validator::class,
        'View'         => Illuminate\Support\Facades\View::class,

        'Socialite'    => Laravel\Socialite\Facades\Socialite::class,

        'Captcha'      => Litepie\Support\Facades\Captcha::class,
        'Form'         => Litepie\Support\Facades\Form::class,
        'Filer'        => Litepie\Support\Facades\Filer::class,
        'Hashids'      => Litepie\Support\Facades\Hashids::class,
        'Menu'         => Litepie\Support\Facades\Menu::class,
        'Theme'        => Litepie\Support\Facades\Theme::class,
        'Trans'        => Litepie\Support\Facades\Trans::class,
        'User'         => Litepie\Support\Facades\User::class,
        'Workflow'     => Litepie\Support\Facades\Workflow::class,
        'Block'        => Litepie\Block\Facades\Block::class,
        'Calendar'     => Litepie\Calendar\Facades\Calendar::class,
        'Contact'      => Litepie\Contact\Facades\Contact::class,
        'Message'      => Litepie\Message\Facades\Message::class,
        'News'         => Litepie\News\Facades\News::class,
        'Page'         => Litepie\Page\Facades\Page::class,
        'Settings'     => Litepie\Settings\Facades\Settings::class,
        'Task'         => Litepie\Task\Facades\Task::class,
 
        'Attribute'   => Laracart\Attribute\Facades\Attribute::class,
        'Category'    => Laracart\Category\Facades\Category::class,
        'Filter'      => Laracart\Filter\Facades\Filter::class,
        'Product'     => Laracart\Product\Facades\Product::class,

        'Cart'      => Laracart\Cart\Facades\Cart::class,
        'Review'    => Laracart\Review\Facades\Review::class,
        'Coupon'    => Laracart\Coupon\Facades\Coupon::class,
        'Order'     => Laracart\Order\Facades\Order::class,
        'Currency'  => Laracart\Currency\Facades\Currency::class,
        'Returns'   => Laracart\Returns\Facades\Returns::class,
        


        'Blog'         => Litecms\Blog\Facades\Blog::class,
        'Newsletter'   => Litecms\Newsletter\Facades\Newsletter::class,
        // 'Career'       => Litecms\Career\Facades\Career::class,
        // 'Contact'      => Litecms\Contact\Facades\Contact::class,
        // 'Faq'          => Litecms\Faq\Facades\Faq::class,
        // 'Forum'        => Litecms\Forum\Facades\Forum::class,
        // 'Gallery'      => Litecms\Gallery\Facades\Gallery::class,
        // 'Portfolio'    => Litecms\Portfolio\Facades\Portfolio::class,
        // 'PriceList'    => Litecms\PriceList\Facades\PriceList::class,
        // 'Team'         => Litecms\Team\Facades\Team::class,
        // 'Testimonial'  => Litecms\Testimonial\Facades\Testimonial::class,

    ],

];