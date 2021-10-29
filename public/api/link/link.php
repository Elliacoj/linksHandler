<?php

use Amaur\App\entity\Link;
use Amaur\App\manager\LinkManager;
use Muffeen\UrlStatus\UrlStatus;
session_start();

require_once "../../../vendor/autoload.php";

header('Content-Type: application/json');
$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case "POST":
        echo json_encode(add(json_decode(file_get_contents('php://input'))));
        break;
    case "SEARCH":
        echo json_encode(search(json_decode(file_get_contents('php://input'))));
        break;
    case "PUT":
        echo json_encode(update(json_decode(file_get_contents('php://input'))));
        break;
    case "GET":
        echo json_encode(getLink());
        break;
    case "DELETE":
        delete(json_decode(file_get_contents('php://input')));
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

        if($url_status->getStatusCode() === 200) {
            $link = new Link(null, $href, $title,"_blanc", $name);
            (new LinkManager())->add($link);
            return true;
        }
    }

    return false;
}

/**
 * Return a link
 * @param $data
 * @return array
 */
function search($data): array {
    $link = (new LinkManager())->search(filter_var($data->id, FILTER_SANITIZE_NUMBER_INT));

    return ['name' => $link->getName(), "href" => $link->getHref(), "title" => $link->getTitle()];
}

/**
 * update a link into link table
 * @param $data
 * @return bool
 */
function update($data):bool {
    if(isset($_SESSION['id'])) {
        $href = filter_var($data->href, FILTER_SANITIZE_URL);
        $name = filter_var($data->name, FILTER_SANITIZE_STRING);
        $title = filter_var($data->title, FILTER_SANITIZE_STRING);
        $id = filter_var($data->id);

        $url_status = UrlStatus::get($href);

        if($url_status->getStatusCode() === 200) {
            $link = new Link($id, $href, $title,"_blanc", $name);
            (new LinkManager())->update($link);
            return true;
        }
    }
    return false;
}

/**
 * Return all data of link table
 * @return array
 */
function getLink(): array {
    echo 1;
    $allLinks = (new LinkManager())->get($_SESSION['id']);
    $links = [];
    foreach($allLinks as $link) {
        $links[] = ["id" => $link->getId(), "href" => $link->getHref(), "title" => $link->getTitle(), "name" => $link->getName()];
    }
    return $links;
}

/**
 * Delete a link into link table
 * @param $data
 * @return bool
 */
function delete($data): bool {
    return (new LinkManager())->delete(filter_var($data->id), FILTER_SANITIZE_NUMBER_INT);
}