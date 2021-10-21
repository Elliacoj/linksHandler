<?php


namespace Amaur\App\Manager;


use Amaur\App\Entity\User;

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
}