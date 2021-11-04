<?php


namespace Amaur\App\manager;


use Amaur\App\entity\User;

class UserManager {

    /**
     * Add an user into user table
     * @param User $user
     * @return bool
     */
    public function add(User $user): bool {
        $lastname = $user->getLastname();
        $firstname = $user->getFirstname();
        $mail = $user->getMail();
        $password = $user->getPassword();

        $stmt = Db::getInstance()->prepare(
            "INSERT INTO prefix_user(nom, prenom, mail, pass) 
                    VALUES(:lastname, :firstname, :mail, :password)"
        );
        $stmt->bindValue("lastname", $lastname);
        $stmt->bindValue("firstname", $firstname);
        $stmt->bindValue("mail", $mail);
        $stmt->bindValue("password", $password);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Return an user or null
     * @param $mail
     * @return User|null
     */
    public function searchMail($mail):?User {
        $stmt = Db::getInstance()->prepare("SELECT * FROM prefix_user WHERE mail = :mail");
        $stmt->bindValue('mail', $mail);
        $user = null;

        if($stmt->execute() && $result = $stmt->fetch()) {
            $user = new User($result['id'], $result['nom'], $result['prenom'], $result['mail'], $result['pass'], $result['role']);
        }
        return $user;
    }

    /**
     * Return an user or null
     * @param $id
     * @return User|null
     */
    public function search($id):?User {
        $stmt = Db::getInstance()->prepare("SELECT * FROM prefix_user WHERE id = :id");
        $stmt->bindValue('id', $id);
        $user = null;

        if($stmt->execute() && $result = $stmt->fetch()) {
            $user = new User($result['id'], $result['nom'], $result['prenom'], $result['mail'], $result['pass'], $result['role']);
        }
        return $user;
    }
}