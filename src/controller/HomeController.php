<?php

namespace Amaur\App\controller;

use Amaur\App\manager\LinkManager;

class HomeController extends Controller {

    /**
     * Redirects into home page
     */
    public function home() {
        if(isset($_SESSION['id'])) {
            self::render("homePage", "Accueil");
        }
        else {
            self::render("login", "Connection");
        }
    }

    /**
     * Redirects into stat page
     */
    public function stat() {
        if(isset($_SESSION['id'])) {
            $links = (new LinkManager())->getAll();
            self::render("stat", "Statistique", [$links]);
        }
        else {
            self::render("login", "Connection");
        }
    }
}