<?php

namespace App\Listeners;

use Kevupton\LaravelCoinpayments\Events\Deposit\DepositComplete;

class DoSomethingOnDepositListener
{

    /**
     * Handler for the DepositComplete event.
     * Here we can do anything with the completed deposit object.
     */
    public function handle(DepositComplete $depositComplete)
    {
        var_dump($depositComplete->deposit->toArray());
    }

}
