<?php

use Amaur\App\entity\Link;

use Amaur\App\manager\LinkManager;
use Amaur\App\manager\UserManager;
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
        $data = json_decode(file_get_contents('php://input'));
        if(isset($data->href, $data->title)) {
            echo json_encode(update($data));
        }
        else {
            echo json_encode(updateClick($data));
        }

        break;
    case "GET":
        echo json_encode(getLink());
        break;
    case "DELETE":
        echo delete(json_decode(file_get_contents('php://input')));
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
        $user = (new UserManager())->search($_SESSION['id']);
        $url_status = UrlStatus::get($href);

        if($url_status->getStatusCode() === 200) {
            $screen = createScreen($href);
            $link = new Link(null, $href, $title,"_blanc", $name, $user, $screen);
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
        $user = (new UserManager())->search($_SESSION['id']);

        $url_status = UrlStatus::get($href);

        if($url_status->getStatusCode() === 200 && (new LinkManager())->check($id, $_SESSION['id']) === true) {
            $screen = createScreen($href);
            $link = new Link($id, $href, $title,"_blanc", $name, $user, $screen);
            (new LinkManager())->update($link);
            return true;
        }
        else {
            return false;
        }
    }
    return false;
}

/**
 * Return all data's user of link table
 * @return array
 */
function getLink(): array {
    $allLinks = (new LinkManager())->get($_SESSION['id']);
    $links = [];
    foreach($allLinks as $link) {
        $links[] = ["id" => $link->getId(), "href" => $link->getHref(), "title" => $link->getTitle(), "name" => $link->getName(), "img" => $link->getImg()];
    }
    return $links;
}

/**
 * Delete a link into link table
 * @param $data
 * @return bool
 */
function delete($data): bool {
    $id = filter_var($data->id, FILTER_SANITIZE_NUMBER_INT);
    if((new LinkManager())->check($id, $_SESSION['id'])) {
        return (new LinkManager())->delete($id);
    }
    return false;
}

function createScreen($url, $options = array()): string {
    $embed_key = 'JY8tfHX3E5bxcHRbxNej08Sm'; # replace it with you Embed API key
    $secret = 'DQSlSNSLOXGnyTVu9yRAufrr'; # replace it with your Secret

    $query = 'url=' . urlencode($url);

    foreach($options as $key => $value) {
        $query .= '&' . trim($key) . '=' . urlencode(trim($value));

    }


    $token = md5($query . $secret);


    return "https://api.thumbalizr.com/api/v1/embed/$embed_key/$token/?$query";
}

function updateClick($data):bool {
    $id = $data->id;
    if(isset($_SESSION['id']) && (new LinkManager())->check($id, $_SESSION['id']) === true) {
        $link = (new LinkManager())->search($id);
        $link->setClick($link->getClick() + 1);
        if((new LinkManager())->updateClick($link)) {
            return true;
        }

    }
    return false;
}
