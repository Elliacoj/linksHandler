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
        $userFk = $link->getUserFk()->getId();
        $img = $link->getImg();

        $stmt = Db::getInstance()->prepare(
            "INSERT INTO prefix_link(href, title, target, name, user_fk, img) 
                    VALUES(:href, :title, :target, :name, :userFk, :img)"
        );
        $stmt->bindValue("href", $href);
        $stmt->bindValue("title", $title);
        $stmt->bindValue("target", $target);
        $stmt->bindValue("name", $name);
        $stmt->bindValue("userFk", $userFk);
        $stmt->bindValue("img", $img);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Get all links of user fk
     * @param $userFk
     * @return array
     */
    public function get($userFk): array {
        $array = [];
        $stmt = Db::getInstance()->prepare("SELECT * FROM prefix_link WHERE user_fk = $userFk");

        if($stmt->execute() && $result = $stmt->fetchAll()) {
            foreach($result as $link) {
                $array[] = new Link($link['id'], $link['href'], $link['title'], $link['target'], $link['name'], (new UserManager())->search($link['user_fk']), $link['img'], $link['click']);
            }
        }
        return $array;
    }

    /**
     * Get all links
     * @return array
     */
    public function getAll(): array {
        $array = [];
        $stmt = Db::getInstance()->prepare("SELECT * FROM prefix_link");

        if($stmt->execute() && $result = $stmt->fetchAll()) {
            foreach($result as $link) {
                $array[] = new Link($link['id'], $link['href'], $link['title'], $link['target'], $link['name'], (new UserManager())->search($link['user_fk']), $link['img'], $link['click']);
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
                $link = new Link($result['id'], $result['href'], $result['title'], $result['target'], $result['name'], (new UserManager())->search($result['user_fk']), $result['img'], $result['click']);
        }
        return $link;
    }

    /**
     * Get all links
     * @param $id
     * @param $userFk
     * @return bool
     */
    public function check($id, $userFk): bool {
        $stmt = Db::getInstance()->prepare("SELECT * FROM prefix_link WHERE id = :id AND user_fk = :userFk");
        $stmt->bindValue("id", $id);
        $stmt->bindValue("userFk", $userFk);

        if($stmt->execute() && $result = $stmt->fetch()) {
            return true;
        }
        return false;
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
        $img = $link->getImg();

        $stmt = Db::getInstance()->prepare(
            "UPDATE  prefix_link 
                    SET href = :href, title = :title, target = :target, name = :name, img = :img 
                    WHERE id = :id"
        );
        $stmt->bindValue("id", $id);
        $stmt->bindValue("href", $href);
        $stmt->bindValue("title", $title);
        $stmt->bindValue("target", $target);
        $stmt->bindValue("name", $name);
        $stmt->bindValue("img", $img);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Update a link into link table
     * @param Link $link
     * @return bool
     */
    public function updateClick(Link $link): bool
    {
        $id = $link->getId();
        $click = $link->getClick();

        $stmt = Db::getInstance()->prepare(
            "UPDATE  prefix_link 
                    SET click = :click 
                    WHERE id = :id"
        );
        $stmt->bindValue("id", $id);
        $stmt->bindValue("click", $click);

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