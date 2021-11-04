<?php


namespace Amaur\App\controller;


use Amaur\App\entity\User;
use Amaur\App\manager\Db;
use Amaur\App\manager\UserManager;

class UserController extends Controller {

    /**
     * Redirects into login page
     */
    public function home() {
        self::render("login", "Connexion");
    }

    /**
     * Login user and create a session
     */
    public function login() {
        $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
        $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $user = (new UserManager())->searchMail($mail);
        if($user !== null && password_verify($pass, $user->getPassword())) {
            $_SESSION['id'] = $user->getId();
            $_SESSION['role'] = $user->getRole();
            header("Location: /index.php?error=0");
        }
        else {
            header("Location: /index.php?error=1");
        }
    }

    /**
     * Create an user into user table
     */
    public function create() {
        $firstname = filter_var($_POST['createFirstname'], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['createLastname'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['createMail'], FILTER_SANITIZE_EMAIL);
        $pass = password_hash(filter_var($_POST['createPassword'], FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);

        $user = new User(null, $lastname, $firstname, $mail, $pass);
        if((new UserManager())->add($user)) {
            $user = (new UserManager())->search(Db::getInstance()->lastInsertId());
            $_SESSION['id'] = $user->getId();
            $_SESSION['role'] = $user->getRole();
            header("Location: /index.php?error=6");
        }
        else {
            header("Location: /index.php?error=7");
        }
    }

    /**
     * Disconnect an user
     */
    public function logout() {
        $_SESSION = array();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        session_destroy();

        header("Location: /index.php?error=2");
    }
}