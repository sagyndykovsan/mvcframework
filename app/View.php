<?php

namespace App;

class View {
    public static function make($view) {
        $layout = self::getViewContent('layout');
        $viewContent = self::getViewContent($view);

        $layout = str_replace('{{content}}', $viewContent, $layout);

        return $layout;
    }

    public static function getViewContent($view) {
        ob_start();
        include_once views_path() . "$view.php";
        return ob_get_clean();
    }
}