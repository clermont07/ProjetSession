<?php
class sexeManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){        $this->setDb($db);    }
    
    public function setDb($db){        $this->_db = $db;    }    
    public function getDB(){        return $this->_db;    }

    //Fonction qui selectionne tous les sexes
    public function getAllSexe(){
        $query = $this->_db->query("SELECT * FROM sexe ");
        $sexe = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $sexe[] = new sexe($data);
        }     
        return $sexe;  
    }

    //Fonction qui selectionne un sexe selon son id
    public function getSexe($id){
        $req = $this->_db->query("SELECT * FROM sexe WHERE idSexe = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new sexe($data);
            return $obj1;
        }
        return false;
    }
}