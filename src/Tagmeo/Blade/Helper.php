<?php

if (!function_exists('blade')) {
    function blade(string $view, $data = [])
    {
        $bladepath = apply_filters('bladerunner/template/bladepath', get_stylesheet_directory());

        $blade = new \Bladerunner\Blade($bladepath, \Bladerunner\Cache::path());

        echo $blade->view()->make($view, $data)->render();
    }
}
