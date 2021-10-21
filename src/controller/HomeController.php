<?php

namespace Amaur\App\controller;

use Amaur\App\manager\LinkManager;

class HomeController extends Controller {

    /**
     * Redirects into home page
     */
    public function home() {
        $links = (new LinkManager())->get();
        self::render("homePage", "Accueil", [$links]);
    }
}