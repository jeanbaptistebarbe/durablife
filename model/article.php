<?php

class articles {

    public $id = 0;
    public $text = '';
    public $title = '';
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
     * methode permettant d'ajouter un article 
     * @return bindValue()
     */
    public function addArticle() {
        $query = 'INSERT INTO `myd_article` (`title`, `text`, `date`, `id_myd_member`, `id_myd_category`) '
                . 'VALUES ( :title, :text, :date, :id_myd_member, :id_myd_category);';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':text', $this->text, PDO::PARAM_STR);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':date', $this->date, PDO::PARAM_STR);
        $queryResult->bindValue(':id_myd_member', $this->id_myd_member, PDO::PARAM_INT); 
        $queryResult->bindValue(':id_myd_category', $this->id_myd_category, PDO::PARAM_INT); 
        return $queryResult->execute();
        
        
    }
    public function getArticleList() {
        $query = 'SELECT * FROM `myd_article`;';
        $queryResult = $this->db->query($query);
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
    public function articleRead() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT * FROM `myd_article` WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
//si la requete c'est bien executé alors on rempli $returnArray avec un objet         
        if ($queryResult->execute()) {
            $return = $queryResult->fetch(PDO::FETCH_OBJ);
        }
//si $return est un objet alors on hydrate       
        if (is_object($return)) {
            $this->title = $return->title;
            $this->date = $return->date;
            $this->text = $return->text;
            $this->id_myd_member = $return->id_myd_member;
            $this->id_myd_category = $return->id_myd_category;
            $isOk = TRUE;
        }
        return $isOk;
    }
    public function ArticleUpdate() {
        $query = 'UPDATE `myd_article` SET `title`=:title, `text`=:text, `date`=:date WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':text', $this->text, PDO::PARAM_STR);
        $queryResult->bindValue(':date', $this->date, PDO::PARAM_STR); 
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT); 
        return $queryResult->execute();
    }
    public function deleteArticle(){
        $query = 'DELETE FROM `myd_article` WHERE `myd_article`.`id`= :idArticle';
        $queryResult = $this->db->prepare($query);
        $queryResult -> bindValue(':idArticle', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
