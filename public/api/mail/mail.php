<?php

use Amaur\App\manager\UserManager;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

session_start();

require_once "../../../vendor/autoload.php";

header('Content-Type: application/json');
$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case "POST":
        add(json_decode(file_get_contents('php://input')));
        break;
}

function add($data) {
    $mailUser = (new UserManager())->search($_SESSION['id'])->getMail();
    $mail = new PHPMailer(true);

    try {
        //Recipients
        $mail->setFrom($mailUser);
        $mail->addAddress('no-reply@elliacoj.be', 'Links Handler');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Demande client';
        $mail->Body    = '' . nl2br($data->text) .'';

        $mail->send();

    }
    catch (Exception $e) {}
}