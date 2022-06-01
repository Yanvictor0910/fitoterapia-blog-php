<?php



class Contact{
    private $id;
    private $name;
    private $email;
    private $content;

    public function setID($id){
        $this->id = trim($id);
    }

    public function getID(){
        return $this->id;
    }

    public function setName($name){
        $this->name = ucwords(trim($name));
    }

    public function getName(){
        return $this->name;
    }

    public function setEmail($email){
        $this->email = strtolower(trim($email));
    }

    public function getEmail(){
        return $this->email;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getContent(){
        return $this->content;
    }
}

interface ContactMethods{
    public function create(Contact $data);
    public function findAll();
    public function update(Contact $data);
    public function delete($id);
}

?>

