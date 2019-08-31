<?php

namespace App\Providers;

use App\Html\Builder\FormBuilder;
use App\Html\Builder\SimpleForm;
use App\Html\HtmlFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FormBuilder::class, function () {
            return new SimpleForm(new HtmlFactory);
        });
    }
}
