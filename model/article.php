<?php

class articles {

    public $id = 0;
    public $photo = '';
    public $text = '';
    public $title= '';
    public $date = '0000-00-00';
    public $id_myd_member = 0;
    public $id_myd_category = 0;
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
    public function addArticle() {
        $query = 'INSERT INTO `myd_article` (`photo`, `text`, `title`, `date`, `id_myd_member `, `id_myd_category`) '
                . 'VALUES (:photo, :text, :title, :date, :id_myd_member, :id_myd_category);';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':photo', $this->photo, PDO::PARAM_STR);
        $queryResult->bindValue(':text', $this->text, PDO::PARAM_STR);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':date', $this->date, PDO::PARAM_STR);
        $queryResult->bindValue(':id_myd_member', $this->id_myd_member, PDO::PARAM_STR);
        $queryResult->bindValue(':id_myd_category', $this->id_myd_category, PDO::PARAM_STR);
        return $queryResult->execute();
    }

}
