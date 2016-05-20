<?php

if (!function_exists('blade')) {
    function blade(string $view, $data = [])
    {
        $bladePath = apply_filters(
            'bladerunner/template/bladepath', Tagmeo\Foundation\Application::resourcePath('views')
        );

        $blade = new Bladerunner\Blade($bladePath, Bladerunner\Cache::path());

        echo $blade->view()->make($view, $data)->render();
    }
}
