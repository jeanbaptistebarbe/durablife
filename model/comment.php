<?php

class comments {

    public $id = 0;
    public $text = '';
    public $date = '0000-00-00';
    public $id_myd_article = 0;
    public $id_myd_member = 0;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=durablife;dbname=durablife_JB;charset=utf8', 'barbe', 'soleil02');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * methode permettant d'ajouter un commentaire 
     * @return bindValue()
     */
//addComment() est la fonction qui vient ajouter un commentaire    
    public function addComment() {
        $query = 'INSERT INTO `myd_comment` (`text`, `date`, `id_myd_member`, `id_myd_article`) '
                . 'VALUES (:text, :date, :id_myd_member, :id_myd_article);';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':text', $this->text, PDO::PARAM_STR);
        $queryResult->bindValue(':date', $this->date, PDO::PARAM_STR);
        $queryResult->bindValue(':id_myd_member', $this->id_myd_member, PDO::PARAM_INT);
        $queryResult->bindValue(':id_myd_article', $this->id_myd_article, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//getCommentList() est la fonction qui me recupere la totalité des commentaires 
    public function getCommentList() {
        $result = array();
        $query = 'SELECT * FROM `myd_comment` 
INNER JOIN `myd_member` ON myd_comment.id_myd_member=myd_member.id
INNER JOIN myd_article ON myd_comment.id_myd_article=myd_article.id
WHERE myd_comment.id_myd_article = :id_comment';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_comment', $this->id_myd_article, PDO::PARAM_INT);
        if ($queryResult->execute()) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

//deleteComment() est la fonction de suppression d'un commentaire 
    public function deleteComment() {
        $query = 'DELETE FROM `myd_comment` WHERE `myd_comment`.`idc`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//getCommentListLinmit() est la fonction qui me prend 4 commentaire afin de les afficher dans l'index
    public function getCommentListLimit() {
        $query = 'SELECT * FROM `myd_comment` LEFT JOIN `myd_member` ON myd_comment.id_myd_member=myd_member.id LIMIT 4;';
        $queryResult = $this->db->query($query);
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
