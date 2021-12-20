<?php
class sexeManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    public function setDb($db){
        $this->_db = $db;
    }
    public function getTest(){
        return "test";
    }
    
    public function getDB(){
        return $this->_db;
    }

    public function getAllSexe(){
        $query = $this->_db->query("SELECT * FROM sexe ");
        $sexe = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $sexe[] = new sexe($data);
        }     
        return $sexe;  
    }
}