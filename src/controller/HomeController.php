<?php

namespace Amaur\App\controller;

class HomeController extends Controller {

    /**
     * Redirects into home page
     */
    public function home() {
        self::render("homePage", "Accueil");
    }
}