<?php

namespace Laracart\Currency\Workflow;

use Laracart\Currency\Models\Currency;
use Laracart\Currency\Notifications\Currency as CurrencyNotifyer;
use Notification;

class CurrencyNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Currency $currency
     *
     * @return void
     */
    public function complete(Currency $currency)
    {
        return Notification::send($currency->user, new CurrencyNotifyer($currency, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Currency $currency
     *
     * @return void
     */
    public function verify(Currency $currency)
    {
        return Notification::send($currency->user, new CurrencyNotifyer($currency, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Currency $currency
     *
     * @return void
     */
    public function approve(Currency $currency)
    {
        return Notification::send($currency->user, new CurrencyNotifyer($currency, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Currency $currency
     *
     * @return void
     */
    public function publish(Currency $currency)
    {
        return Notification::send($currency->user, new CurrencyNotifyer($currency, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Currency $currency
     *
     * @return void
     */
    public function archive(Currency $currency)
    {
        return Notification::send($currency->user, new CurrencyNotifyer($currency, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Currency $currency
     *
     * @return void
     */
    public function unpublish(Currency $currency)
    {
        return Notification::send($currency->user, new CurrencyNotifyer($currency, 'unpublish'));;

    }
}
