<?php

namespace BagistoPlus\BasicBlocks;

use BagistoPlus\Visual\Facades\Visual;
use Illuminate\Support\Facades\Blade;
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
        Visual::discoverBlocksIn(__DIR__.'/Sections', 'BagistoPlus\\BasicBlocks\\Sections');

        Blade::directive('bb_svg', fn ($expression) => "<?php echo \\BagistoPlus\\BasicBlocks\\inline_svg($expression); ?>");
        Blade::directive('bb_image_to_base64', fn ($expression) => "<?php echo \\BagistoPlus\\BasicBlocks\\image_to_base64($expression); ?>");
    }
}
