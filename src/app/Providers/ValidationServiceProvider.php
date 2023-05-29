<?php

namespace App\Providers;

use App\Validation\Validator;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Validation\Factory;

class ValidationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->afterResolving(Factory::class, function (Factory $factory) {
            /** @var \Illuminate\Validation\Factory|Factory $factory */
            $factory->resolver(fn (...$args) => new Validator(...$args));
        });
    }
}
