<?php

namespace Core\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand;
use Core\Console\Concerns\GeneratesCoreClass;

class CoreModelMakeCommand extends ModelMakeCommand
{
    use GeneratesCoreClass;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:core-model';

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
