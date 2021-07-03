<?php

namespace Core;

use Core\Console\Commands\CoreActionMakeCommand;
use Core\Console\Commands\CoreCastMakeCommand;
use Core\Console\Commands\CoreConsoleMakeCommand;
use Core\Console\Commands\CoreControllerMakeCommand;
use Core\Console\Commands\CoreModelMakeCommand;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootComponents();
        $this->bootComposer();
    }

    public function register()
    {
        $this->registerLivewire();
        $this->registerCommands();
    }

    private function bootComponents()
    {
        //
    }

    private function bootComposer()
    {
        //
    }

    private function registerLivewire()
    {
        //
    }

    protected function registerCommands()
    {
        $this->commands([
            CoreActionMakeCommand::class,
            CoreCastMakeCommand::class,
            CoreControllerMakeCommand::class,
            CoreModelMakeCommand::class,
            CoreConsoleMakeCommand::class,
            MenuModelMakeCommand::class,
        ]);
    }
}
