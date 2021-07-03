<?php

namespace Core\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Core\Console\Concerns\GeneratesCoreClass;

abstract class CoreGeneratorCommand extends GeneratorCommand
{
    use GeneratesCoreClass;
}
