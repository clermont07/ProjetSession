<?php
class groupeSanguinManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    public function setDb($db){        $this->_db = $db;    }    
    public function getDB(){        return $this->_db;    }

    //Fonction qui selectionne les groupes sanguins
    public function getAllSang(){
        $query = $this->_db->query("SELECT * FROM groupesanguin ");
        $sexe = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $sexe[] = new groupeSanguin($data);
        }     
        return $sexe;  
    }

    //Fonction qui selectionne un groupe sanguin selon son id
    public function getSang($id){
        $req = $this->_db->query("SELECT * FROM groupesanguin WHERE idGrpSang = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new groupeSanguin($data);
            return $obj1;
        }
        return false;
    }
}