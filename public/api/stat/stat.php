<?php

use Amaur\App\manager\LinkManager;

session_start();

require_once "../../../vendor/autoload.php";

header('Content-Type: application/json');
$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case "GET":
        echo json_encode(get());
        break;
}


/**
 * Return all data of user
 */
function get(): array {
    $allLinks = (new LinkManager())->get($_SESSION['id']);
    $links = [];
    foreach($allLinks as $link) {
        $links[] = ["id" => $link->getId(), "href" => $link->getHref(), "title" => $link->getTitle(), "name" => $link->getName(), "img" => $link->getImg(), "click" => $link->getClick()];
    }
    return $links;
}