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

    /**
     * Get all links
     * @param $id
     * @return Link|null
     */
    public function search($id): ?Link {
        $stmt = Db::getInstance()->prepare("SELECT * FROM prefix_link WHERE id = :id");
        $stmt->bindValue("id", $id);
        $link = null;

        if($stmt->execute() && $result = $stmt->fetch()) {
                $link = new Link($result['id'], $result['href'], $result['title'], $result['target'], $result['name']);
        }
        return $link;
    }

    /**
     * Update a link into link table
     * @param Link $link
     * @return bool
     */
    public function update(Link $link): bool
    {
        $id = $link->getId();
        $href = $link->getHref();
        $title = $link->getTitle();
        $target = $link->getTarget();
        $name = $link->getName();

        $stmt = Db::getInstance()->prepare("UPDATE  prefix_link SET href = :href, title = :title, target = :target, name = :name WHERE id = :id");
        $stmt->bindValue("id", $id);
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
     * Delete a link into link table
     * @param $id
     * @return bool
     */
    public function delete($id): bool {
        $stmt = Db::getInstance()->prepare("DELETE FROM prefix_link WHERE id = :id");
        $stmt->bindValue("id", $id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}