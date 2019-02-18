<?php

class members {

    public $id = 0;
    public $name = '';
    public $firstname = '';
    public $birthdate = '0000-00-00';
    public $phone = '0000000000';
    public $mail = '';
    public $password = '';
    public $id_myd_grade = 0;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=durablife;dbname=durablife_JB;charset=utf8', 'barbe', 'soleil02');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * methode permettant d'ajouter un membre 
     * @return bindValue()
     */
    //methode pour ajouter un membre dans la db
    public function addMember() {
        $query = 'INSERT INTO `myd_member` (`name`, `firstname`, `password`, `birthdate`, `mail`, `phone`) '
                . 'VALUES (:name, :firstname, :password, :birthdate, :mail, :phone);';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    //methode pour recuperer le profil d'un membre selon l'id
    public function profilMember() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT * FROM `myd_member` WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
//si la requete c'est bien executé alors on rempli $returnArray avec un objet         
        if ($queryResult->execute()) {
            $return = $queryResult->fetch(PDO::FETCH_OBJ);
        }
//si $return est un objet alors on hydrate       
        if (is_object($return)) {
            $this->name = $return->name;
            $this->firstname = $return->firstname;
            $this->birthdate = $return->birthdate;
            $this->phone = $return->phone;
            $this->id = $return->id;
            $this->mail = $return->mail;
            $isOk = TRUE;
        }
        return $isOk;
    }

    public function profilUpdate() {
        $query = 'UPDATE `myd_member` SET `name`=:name, `firstname`=:firstname, `birthdate`=:birthdate, `phone`=:phone, `mail`=:mail WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
    function checkMail() {
        $query = 'SELECT COUNT(*) AS `nbrMail` FROM `myd_member` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        $checkMail = $result->fetch(PDO::FETCH_OBJ);
        return $checkMail->nbrMail;
    }
 function getHashMember() {
        $query = 'SELECT `password` FROM `myd_member` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }
    function getMemberInfo() {
        $query = 'SELECT `id`, `name`, `id_myd_grade` FROM `myd_member` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }
    public function profilDelete(){
        $query = 'DELETE FROM `myd_member` WHERE `myd_member`.`id`= :idMember';
        $queryResult = $this->db->prepare($query);
        $queryResult -> bindValue(':idMember', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
?>

