<?php


namespace Amaur\App\manager;


use Amaur\App\entity\Link;

class LinkManager {
    /**
     * Add an user into user table
     * @param Link $link
     * @return bool
     */
    public function add(Link $link): bool {
        $href = $link->getHref();
        $title = $link->getTitle();
        $target = $link->getTarget();
        $name = $link->getName();

        $stmt = Db::getInstance()->prepare(
            "INSERT INTO prefix_link(href, title, target, name) 
                    VALUES(:href, :title, :target, :name)"
        );
        $stmt->bindValue("href", $href);
        $stmt->bindValue("title", $title);
        $stmt->bindValue("target", $target);
        $stmt->bindValue("name", $name);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Get all links
     * @return array
     */
    public function get(): array {
        $array = [];
        $stmt = Db::getInstance()->prepare("SELECT * FROM prefix_link");
        if($stmt->execute() && $result = $stmt->fetchAll()) {
            foreach($result as $link) {
                $array[] = new Link($link['id'], $link['href'], $link['title'], $link['target'], $link['name']);
            }
        }
        return $array;
    }
}