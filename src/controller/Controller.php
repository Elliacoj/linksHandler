<?php


namespace Amaur\App\controller;


class Controller {

    /**
     * Render for redirects page into base view page
     * @param string $view
     * @param string $title
     * @param array $data
     */
    public static function render(string $view, string $title, array $data = []) {
        ob_start();
        require dirname(__FILE__) . "/../../view/" . $view . ".view.php";
        $html = ob_get_clean();
        require dirname(__FILE__) . "/../../view/__partials/base.view.php";
    }
}