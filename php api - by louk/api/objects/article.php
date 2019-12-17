<?php
class Article{
 
    private $conn;
    private $table_name = "article";
 
    
    public $id;
    public $title;
    public $content;
    public $id__autor;
    public $created;
 
   
    public function __construct($db){
        $this->conn = $db;
    }
    
    
    
    //לפרסם מאמר
    function InsertArticle($id_get = 0,$title_,$content_,$created_){

        $query = "INSERT into article (title,content,id__autor)
                                values ($title_,$content_,$id_get,$created_)";
        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
        
    }
     
    //למחוק מאמר
 function DeleteArticle($id_get = 0){
        
        $query = "delete from article where id = ".$id_get."";
        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        
        
    }
    //לקבל את רשימת כל המאמרים
    function GetAllArticels(){
        $query = "select * from article where article.id__autor = ".$this->id__autor."";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        
        return $stmt;
    }
    //לקבל רשימת מאמר
    function GetArticelsById($id_get = 0){
        $query = "select * from article where article.id = ".$id_get."";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        
        return $stmt;
    }
    //  לערוך מאמר
    function AddArticleTitle($id_get = 0,$title_,$content_){
        $query = "update article 
        set  title = ".$title_." , content = ".$content_."
        where article.id = ".$id_get."";
        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        
        
    }
     // title לערוך מאמר
     function AddArticleTitle($id_get = 0,$title_){
        $query = "update article 
        set  title = ".$title_."
        where article.id = ".$id_get."";
        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        
        
    }
     // content לערוך מאמר
     function AddArticlecontent($id_get = 0,$content_){
        $query = "update article 
        set  content = ".$content_."
        where article.id = ".$id_get."";
        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        
       
    }
    
    
   
}