<?php

namespace Core\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Core\Console\Concerns\GeneratesCoreClass;

class CoreControllerMakeCommand extends ControllerMakeCommand
{
    use GeneratesCoreClass;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:core-controller';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }
}
