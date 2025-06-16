<?php

namespace App\Services\PaymentSystem;

use Stripe\Stripe;
use Stripe\Account;
use Stripe\AccountLink;
use Illuminate\Support\Facades\Auth;

class StripeConnectService
{
    public function createOrGetAccountLink($user)
    {
        Stripe::setApiKey(config('stripe.secret'));

        // إذا لم يكن لديه حساب Stripe بعد، أنشئ له واحدًا
        if (!$user->stripe_account_id) {
            $account = Account::create([
                'type' => 'express',
                'country' => 'US',
                'email' => $user->email,
            ]);

            $user->stripe_account_id = $account->id;
            $user->save();
        }

        // أنشئ رابط تسجيل
        $accountLink = AccountLink::create([
            'account' => $user->stripe_account_id,
            'refresh_url' => route('stripe.account.refresh'),
            'return_url' => route('stripe.account.return'),
            'type' => 'account_onboarding',
        ]);

        return $accountLink->url;
    }

    public function getStripeAccountStatus($user)
    {
        Stripe::setApiKey(config('stripe.secret'));
        $account = Account::retrieve($user->stripe_account_id);

        return $account->charges_enabled;
    }
}
