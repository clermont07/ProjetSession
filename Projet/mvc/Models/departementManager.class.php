<?php
class departementManager{
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

    public function getAllDepartement(){
        $query = $this->_db->query("SELECT * FROM departement");
        $departement = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $departement[] = new departement($data);
        }     
        return $departement;  
    }

    public function getDepartement($id){
        $req = $this->_db->query("SELECT * FROM departement WHERE idDepartement = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new departement($data);
            return $obj1;
        }
        return false;
    }

    public function supprimer(departement $departement){
        $query = $this->_db->prepare("DELETE FROM departement WHERE idDepartement =(:idDepartement)"); 
        $query->bindValue(":idDepartement",$departement->getIdDepartement());
        $query->execute();
    }
    public function inserer(departement $departement) 
    {
        $query = $this->_db->prepare("INSERT into departement(Departement) 
        VALUES (:departement)");
        $query->bindValue(":departement",$departement->getDepartement());
        $query->execute();
    }
}