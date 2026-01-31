<?php

namespace BagistoPlus\BasicBlocks\Tests;

use BagistoPlus\BasicBlocks\BasicBlocksServiceProvider;
use BagistoPlus\Visual\Providers\VisualServiceProvider;
use Craftile\Laravel\CraftileServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CraftileServiceProvider::class,
            VisualServiceProvider::class,
            BasicBlocksServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
