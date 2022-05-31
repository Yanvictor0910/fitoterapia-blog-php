<?php
require_once '../database/database.php';
require_once '../database/dao_class/ContactDaoMysql.php';

session_start();

$contactDao = new ContactDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $email && $content){
    $contact = new Contact();
    $contact->setName($name);
    $contact->setEmail($email);
    $contact->setContent($content);

    $contactDao->create($contact);

    $_SESSION['success'] = 'Formulário Enviado com Sucesso';
    header("Location: ../contact.php");
}else{
    $_SESSION['error'] = 'Preencha todos os campos corretamente, por favor.';
    header ("location: ../contact.php");
    exit;
}