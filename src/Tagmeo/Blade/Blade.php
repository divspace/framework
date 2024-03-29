<?php

namespace Tagmeo\Blade;

use Illuminate\Filesystem\Filesystem;
use Tagmeo\Foundation\Application;

require ABSPATH.'/wp-admin/includes/plugin.php';

class Blade
{
    protected $file;

    public function __construct()
    {
        $this->file = new Filesystem;

        $plugin = Application::pluginPath('bladerunner/bladerunner.php');

        if (!is_plugin_active($plugin) && $this->file->exists($plugin)) {
            activate_plugin($plugin);
        }

        $this->addFilters();
    }

    private function addFilters()
    {
        add_filter('bladerunner/cache/permission', function () {
            return 755;
        });

        add_filter('bladerunner/cache/path', function () {
            return Application::storagePath('framework/views');
        });

        add_filter('bladerunner/template/bladepath', function ($path) {
            return Application::resourcePath('views');
        });
    }
}
