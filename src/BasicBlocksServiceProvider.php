<?php

namespace BagistoPlus\BasicBlocks;

use BagistoPlus\Visual\Facades\Visual;
use Illuminate\Support\ServiceProvider;

class BasicBlocksServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'basic-blocks');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'basic-blocks');

        Visual::discoverBlocksIn(__DIR__.'/Blocks', 'BagistoPlus\\BasicBlocks\\Blocks');
    }
}
