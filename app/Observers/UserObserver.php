<?php

namespace App\Observers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        DB::table('user_tokens')->insert([
            'user_id'=>$user->id,
            'api_token' =>bin2hex(openssl_random_pseudo_bytes(30)),
            'token_expire_at'=>Carbon::now()->addMinute(30)
        ]);


    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }
}