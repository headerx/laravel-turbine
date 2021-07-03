<?php

namespace Turbine;

use Turbine\Console\Commands\TurbineActionMakeCommand;
use Turbine\Console\Commands\TurbineCastMakeCommand;
use Turbine\Console\Commands\TurbineConsoleMakeCommand;
use Turbine\Console\Commands\TurbineControllerMakeCommand;
use Turbine\Console\Commands\TurbineModelMakeCommand;

class TurbineServiceProvider extends ServiceProvider
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
            TurbineActionMakeCommand::class,
            TurbineCastMakeCommand::class,
            TurbineControllerMakeCommand::class,
            TurbineModelMakeCommand::class,
            TurbineConsoleMakeCommand::class,
            // MenuModelMakeCommand::class,
        ]);
    }
}
