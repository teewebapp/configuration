<?php

namespace Tee\Configuration;

use Tee\Configuration\Widgets\ConfigurationBoxList;
use Tee\System\Widget;
use Event;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->bind('tee.configuration', function() {
            return new Services\ConfigurationService();
        });

        class_alias('Tee\Configuration\Facades\Configuration', 'Tee\Config');

        Event::listen('admin::menu.load', function($menu) {
            $format = '<img src="%s" class="fa" />&nbsp;&nbsp;<span>%s</span>';
            $menu->add(
                sprintf($format, moduleAsset('configuration', 'images/icon_configuration.png'), 'Configuração'),
                route('admin.configuration.index')
            );
        });
    }
}
