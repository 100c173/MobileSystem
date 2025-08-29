<?php

namespace App\Http\Controllers\PaymentSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\PaymentSystem\StripeConnectService;


class StripeConnectController extends Controller
{
    protected $stripeService;

    public function __construct(StripeConnectService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function createAccountLink()
    {
        $user = Auth::user();

        if (! $user->hasRole('agent')) {
            abort(403, 'This procedure is only available for agents.');
        }

        $url = $this->stripeService->createOrGetAccountLink($user);

        return redirect($url);
    }

    public function accountReturn()
    {
        $user = Auth::user();

        if (! $user->hasRole('agent')) {
            abort(403);
        }

        if (! $user->stripe_account_id) {
            return redirect()->route('dashboard')->with('error', 'There is no account related to stripe.');
        }

        $chargesEnabled = $this->stripeService->getStripeAccountStatus($user);

        if ($chargesEnabled) {
            return redirect()->route('agent.dashboard')->with('success', '✅Your account has been successfully registered. You can now receive payments by Stripe');
        } else {
            return redirect()->route('agent.ashboard')->with('error', '⚠️Please complete the registration in Stripe.');
        }
    }

    public function accountRefresh()
    {
        return redirect()->route('stripe.account.createLink')->with('error', 'Please complete the registration in Stripe.');
    }
}
