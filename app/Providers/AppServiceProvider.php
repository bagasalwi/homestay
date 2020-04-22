<?php

namespace App\Providers;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Carbon Indonesia
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');

        Schema::defaultStringLength(191);

        // Override the email notification for verifying email
        VerifyEmail::toMailUsing(function ($notifiable,$url){
            $mail = new MailMessage;
            $mail->subject('Welcome!');
            $mail->markdown('emails.verify-email', ['url' => $url]);
            return $mail;
        });
    }
}
