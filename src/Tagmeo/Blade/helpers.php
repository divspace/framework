<?php

if (!function_exists('blade')) {
    function blade(string $view, $data = [])
    {
        $cachePath = Bladerunner\Cache::path();
        $bladePath = Tagmeo\Foundation\Application::resourcePath('views');

        if (defined('WP_DEBUG') && WP_DEBUG === true) {
            (new Illuminate\Filesystem\Filesystem)->delete(function () {
                $this->files($cachePath);
            });
        }

        $bladePath = apply_filters('bladerunner/template/bladepath', $bladePath);

        echo (new Bladerunner\Blade($bladePath, $cachePath))
            ->view()
            ->make($view, $data)
            ->render();
    }
}
