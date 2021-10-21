<?php


namespace Amaur\App\controller;


use Amaur\App\entity\Link;
use Amaur\App\manager\LinkManager;

class LinkController extends Controller {
    /**
     * Redirects into add link page
     */
    public function home() {
        self::render("add.link", "Ajout de lien");
    }

    /**
     * Add a link into link table
     */
    public function add() {
        $href = filter_var($_POST['hrefLink'], FILTER_SANITIZE_STRING);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

        $link = new Link(null, $href, $title,"_blanc", $name);

        (new LinkManager())->add($link);

        header("Location: /index.php?error=3");
    }
}