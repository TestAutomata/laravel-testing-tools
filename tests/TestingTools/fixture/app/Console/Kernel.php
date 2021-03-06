<?php

class Kernel extends \Orchestra\Testbench\Console\Kernel
{
    protected $commands = [
        GenericCommand::class,
        TableOutputCommand::class,
        ConfirmationCommand::class,
        ConfirmableTraitCommand::class,
    ];
}
