<?php
class prescriptionManager{
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

    public function insertion(prescription $prescription) 
    {
        $query = $this->_db->prepare("INSERT into prescription(Date,Description,idHopital,idEmployer,idPatient) 
        VALUES (:date,:description,:idHopital,:idEmployer,:idPatient)"); 
        $query->bindValue(":date",$prescription->getDate());
        $query->bindValue(":description",$prescription->getDescription());
        $query->bindValue(":idHopital",$prescription->getIdHopital());
        $query->bindValue(":idEmployer",$prescription->getIdEmployer());
        $query->bindValue(":idPatient",$prescription->getIdPatient());
        $query->execute();
    }

    public function getPrescription($id){
        $query = $this->_db->query("SELECT * FROM prescription WHERE idPatient = ".$id."");
        $prescription = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $prescription[] = new prescription($data);
        }     
        return $prescription;  
    }
}