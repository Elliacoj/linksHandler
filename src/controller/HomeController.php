<?php

namespace Amaur\App\controller;

use Amaur\App\manager\LinkManager;

class HomeController extends Controller {

    /**
     * Redirects into home page
     */
    public function home() {
        self::render("homePage", "Accueil");
    }
}