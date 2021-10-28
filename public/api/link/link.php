<?php

use Amaur\App\entity\Link;
use Amaur\App\manager\LinkManager;
use Muffeen\UrlStatus\UrlStatus;

require_once "../../../vendor/autoload.php";

header('Content-Type: application/json');
$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case "POST":
        echo json_encode(add(json_decode(file_get_contents('php://input'))));
        break;
}

/**
 * Add a link into link table
 * @param $data
 * @return bool
 */
function add($data):bool {
    if(isset($_SESSION['id'])) {
        $href = filter_var($data->href, FILTER_SANITIZE_URL);
        $name = filter_var($data->name, FILTER_SANITIZE_STRING);
        $title = filter_var($data->title, FILTER_SANITIZE_STRING);

        $url_status = UrlStatus::get($href);

        if($url_status->getStatusCode() == 200) {
            $link = new Link(null, $href, $title,"_blanc", $name);
            (new LinkManager())->add($link);
            return true;
        }
    }

    return false;
}