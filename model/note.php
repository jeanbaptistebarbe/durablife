<?php

class notes {

    public $id = 0;
    public $grade = '';
    public $id_myd_member = 0;
    public $id_myd_article = 0;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=durablife;dbname=durablife_JB;charset=utf8', 'barbe', 'soleil02');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * methode permettant d'ajouter une note à un article par un membre 
     * @return bindValue()
     */
    public function addNote() {
        $query = 'INSERT INTO `myd_note` (`grade`, `id_myd_article`, `id_myd_member`) '
                . 'VALUES ( :grade, :id_myd_article, :id_myd_member);';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':grade', $this->grade, PDO::PARAM_STR);
        $queryResult->bindValue(':id_myd_article', $this->id_myd_article, PDO::PARAM_STR);
        $queryResult->bindValue(':id_myd_member', $this->id_myd_member, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function getNote() {
        $isOk = False;
        $query = 'SELECT * FROM `myd_note` WHERE `id_myd_article`= :id_myd_article';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_myd_article', $this->id_myd_article, PDO::PARAM_INT);
        $queryResult->fetch(PDO::FETCH_OBJ);
        if ($queryResult->execute()) {
            $return = $queryResult->fetch(PDO::FETCH_OBJ);
        }
//si $return est un objet alors on hydrate       
        if (is_object($return)) {
            $this->grade = $return->grade;
            $isOk = TRUE;
        }
        return $isOk;
    }

}
