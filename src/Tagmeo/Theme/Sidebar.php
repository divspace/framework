<?php

namespace Tagmeo\Theme;

class Sidebar
{
    public function __construct()
    {
        add_action('widgets_init', function () {
            register_sidebar([
                'name' => __('Primary Sidebar', 'tagmeo'),
                'id' => 'primary-sidebar',
                'before_widget' => '<section class="widget %1$s %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            ]);
        });
    }

    public static function displaySidebar()
    {
        static $display;

        isset($display) || $display = !in_array(true, [
            is_404(),
            is_front_page()
        ]);

        return apply_filters('tagmeo/display_sidebar', $display);
    }
}
