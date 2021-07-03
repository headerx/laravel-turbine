<?php

namespace Core\Console\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand;
use Core\Console\Concerns\GeneratesCoreClass;

class CoreConsoleMakeCommand extends ConsoleMakeCommand
{
    use GeneratesCoreClass;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:core-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Core command';

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
