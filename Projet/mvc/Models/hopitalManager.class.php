<?php
class hopitalManager{
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

    public function getAllHopital(){
        $query = $this->_db->query("SELECT * FROM hopital ");
        $hopital = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $hopital[] = new hopital($data);
        }     
        return $hopital;  
    }

    public function getHopital($id){
        $req = $this->_db->query("SELECT * FROM hopital WHERE idHopital = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new hopital($data);
            return $obj1;
        }
        return false;
    }

}