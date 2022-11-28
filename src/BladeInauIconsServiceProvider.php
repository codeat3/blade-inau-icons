<?php

declare(strict_types=1);

namespace Codeat3\BladeInauIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeInauIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-inau-icons', []);

            $factory->add('inau-icons', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-inau-icons.php', 'blade-inau-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-inau-icons'),
            ], 'blade-inau-icons');

            $this->publishes([
                __DIR__ . '/../config/blade-inau-icons.php' => $this->app->configPath('blade-inau-icons.php'),
            ], 'blade-inau-icons-config');
        }
    }
}
