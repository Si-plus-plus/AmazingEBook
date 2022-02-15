<?php

namespace App\Policies;

use App\Models\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function account(Account $account) {
        return $account->role_id !== 1;
    }

    public function order(Account $account, HeaderOrder $order) {
        return $account->id === $order->account_id;
    }
}
