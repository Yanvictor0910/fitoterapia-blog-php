<?php

require '../database/models/Contact.php';

class ContactDaoMysql implements DatabaseMethods{
    private $pdo;

    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(Contact $contactData){
        $sql = $this->pdo->prepare("INSERT INTO `contacts` (`name`, `email`, `content`) VALUES (:name, :email, :content) ");
        $sql->bindValue(':name', $contactData->getName());
        $sql->bindValue(':email', $contactData->getEmail());
        $sql->bindValue(':content', $contactData->getContent());
        $sql->execute();

        $contactData->setID($this->pdo->lastInsertId());

        return $contact;
    }

    public function findAll(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM `contacts`");
        
        if($sql->rowCount() > 0){
            $list = $sql->fetchAll();;
        
            foreach($list as $item){
                $contact = new Contact();
                $contact->setID($item['id']);
                $contact->setName($item['name']);
                $contact->setEmail($item['email']);
                $contact->setContent($item['content']);

                $array[] = $contact;
            }
        }

        return $array;
    }

    public function update(Contact $contactData){
        $sql = $this->pdo->prepare("UPDATE `contacts` SET `name` = :name, `email` = :email, `content` = :content WHERE id = :id ");
        $sql->bindValue(":name", $contactData['name']);
        $sql->bindValue(":email", $contactData['email']);
        $sql->bindValue(":content", $contactData['content']);
        $sql->bindValue(":id", $contactData['id']);
        $sql->execute();

        return true;
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM `contacts` WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }
}

?>