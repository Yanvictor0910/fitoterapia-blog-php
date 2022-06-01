<?php

include './../functions.php';

class ContactDaoMysql implements ContactMethods{
    private $pdo;

    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(Contact $data){
        $sql = $this->pdo->prepare("INSERT INTO `contacts` (`name`, `email`, `content`) VALUES (:name, :email, :content) ");
        $sql->bindValue(':name', $data->getName());
        $sql->bindValue(':email', $data->getEmail());
        $sql->bindValue(':content', $data->getContent());
        $sql->execute();

        $data->setID($this->pdo->lastInsertId());

        return $data;
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

    public function update(Contact $data){
        $sql = $this->pdo->prepare("UPDATE `contacts` SET `name` = :name, `email` = :email, `content` = :content WHERE id = :id ");
        $sql->bindValue(":name", $data['name']);
        $sql->bindValue(":email", $data['email']);
        $sql->bindValue(":content", $data['content']);
        $sql->bindValue(":id", $data['id']);
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