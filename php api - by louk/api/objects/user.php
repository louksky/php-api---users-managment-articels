<?php
class User{
 
    
    private $conn;
    private $table_name = "users";
 
    
    public $id;
    public $username;
    public $password;
    public $created;
 
   
    public function __construct($db){
        $this->conn = $db;
    }
    
    function signup(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, created=:created";
    
       
        $back_smtp = $this->conn->prepare($query);
    
        
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->created=htmlspecialchars(strip_tags($this->created));
    
        
        $back_smtp->bindParam(":username", $this->username);
        $back_smtp->bindParam(":password", $this->password);
        $back_smtp->bindParam(":created", $this->created);
    
        
        if($back_smtp->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }
    
    function login(){
        
        $query = "SELECT
                    `id`, `username`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."'";
        
        $back_smtp = $this->conn->prepare($query);
        
        $back_smtp->execute();
        return $back_smtp;
    }
    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."'";
        
        $back_smtp = $this->conn->prepare($query);
       
        $back_smtp->execute();
        if($back_smtp->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}