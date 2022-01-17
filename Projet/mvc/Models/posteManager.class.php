<?php
class posteManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){        $this->setDb($db);    }
    
    public function setDb($db){        $this->_db = $db;    }    
    public function getDB(){        return $this->_db;    }

    //Fonction qui selection un poste selon son id
    public function getPoste($id){
        $req = $this->_db->query("SELECT * FROM poste WHERE idPoste = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new poste($data);
            return $obj1;
        }
        return false;
    }

    //Fonction qui selectionne tous les postes
    public function getAllPoste(){
        $query = $this->_db->query("SELECT * FROM poste ");
        $poste = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $poste[] = new poste($data);
        }     
        return $poste;  
    }
}