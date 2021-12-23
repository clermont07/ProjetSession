<?php
class rendezvousManager{
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

    public function getRendezvous($id){
        $query = $this->_db->query("SELECT * FROM rendezvous WHERE idEmployer = ".$id."");
        $rendezvous = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $rendezvous[] = new rendezvous($data);
        }     
        return $rendezvous;  
    }
    public function getIdRendezvous($id){
        $query = $this->_db->query("SELECT * FROM rendezvous WHERE idRendezvous = ".$id."");
        $rendezvous = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $rendezvous[] = new rendezvous($data);
        }     
        return $rendezvous;  
    }

    public function getPatientRendezvous($id){
        $query = $this->_db->query("SELECT * FROM rendezvous WHERE idPatient = ".$id."");
        $rendezvous = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $rendezvous[] = new rendezvous($data);
        }     
        return $rendezvous;  
    }

    public function updateRendezvous(rendezvous $rendezvous) 
    {
        $query = $this->_db->prepare("UPDATE rendezvous SET idShedule = (:idPatient) WHERE idRendezvous = (:idRendezvous)"); 
        $query->bindValue(":idPatient",$rendezvous->getIdShedule());
        $query->bindValue(":idRendezvous",$rendezvous->getIdRendezvous());
        $query->execute();
    }

    public function supprimer(rendezvous $rendezvous){
        $query = $this->_db->prepare("DELETE FROM rendezvous WHERE idRendezvous =(:idRendezvous)"); 
        $query->bindValue(":idRendezvous",$rendezvous->getIdRendezvous());
        $query->execute();
    }
    public function insertion(rendezvous $rendezvous) 
    {
        $query = $this->_db->prepare("INSERT into rendezvous(idEmployer,idPatient,idShedule) VALUES (:idEmployer,:idPatient,:idShedule)"); 
        $query->bindValue(":idEmployer",$rendezvous->getIdEmployer());
        $query->bindValue(":idPatient",$rendezvous->getIdPatient());
        $query->bindValue(":idShedule",$rendezvous->getIdShedule());
        $query->execute();
    }
}