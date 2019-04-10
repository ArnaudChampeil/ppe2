<?php
require_once "model/Manager.php";

class ArticlesManager{
    private $manager;

    function __construct(){
        $this->manager = new Manager;
    }
    public function getArticles(){
        $db = $this->manager->connectDb();
        $articles = $db->query("SELECT a.id_article, a.title, a.content, a.link, a.dateCreation, i.extension FROM articles a, display d, images i WHERE a.id_article = d.id_article AND d.id_image = i.id_image GROUP BY dateCreation DESC");
        return $articles;
    }
    public function getArticle($id){
        $db = $this->manager->connectDb();
        $article = $db->prepare("SELECT a.id_article, a.title, a.content, a.link, a.dateCreation, i.extension FROM articles a, display d, images i WHERE a.id_article = d.id_article AND d.id_image = i.id_image AND a.id_article = ? GROUP BY dateCreation DESC");
        $article->execute(array($id));

        return $article->fetch();
    }
    public function get5Articles(){
        $db = $this->manager->connectDb();
        $articles = $db->query("SELECT a.id_article, a.title, a.content, a.link, a.dateCreation, i.extension FROM articles a, display d, images i WHERE a.id_article = d.id_article AND d.id_image = i.id_image GROUP BY dateCreation DESC LIMIT 5 OFFSET 0");
        return $articles;
    }

    //Relation N,N
    public function setArticleReturnId($title, $content, $link, $id_account){
        $db = $this->manager->connectDb();
        $article = $db->prepare("INSERT INTO articles SET title = ?, content = ?, link = ?, dateCreation = NOW(), id_account = ?");
        $article->execute(array($title, $content, $link, $id_account));


        return $id = $db->lastInsertId();
    }
    public function setUpdateArticle($title, $content, $link, $id_article){
        $db = $this->manager->connectDb();
        $article = $db->prepare("UPDATE articles SET title = ?, content = ?, link = ? WHERE id_article = ?");
        $article->execute(array($title, $content, $link, $id_article));
    }

    public function unsetArticle($id_article){
        $db = $this->manager->connectDb();
        $article = $db->prepare("DELETE FROM articles WHERE id_article = ?");
        $article->execute(array($id_article));
    }
}