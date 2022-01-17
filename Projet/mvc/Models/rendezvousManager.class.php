<?php
class rendezvousManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){        $this->setDb($db);    }
    
    public function setDb($db){        $this->_db = $db;    }    
    public function getDB(){        return $this->_db;    }

    //Fonction qui selectionne un rendez vous selon le id de l'employer
    public function getRendezvous($id){
        $query = $this->_db->query("SELECT * FROM rendezvous WHERE idEmployer = ".$id."");
        $rendezvous = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $rendezvous[] = new rendezvous($data);
        }     
        return $rendezvous;  
    }

    //Fonction qui selectionne un rendez vous selon son id
    public function getIdRendezvous($id){
        $query = $this->_db->query("SELECT * FROM rendezvous WHERE idRendezvous = ".$id."");
        $rendezvous = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $rendezvous[] = new rendezvous($data);
        }     
        return $rendezvous;  
    }

    //Fonction qui selectionne un rendez vous selon le id du patient et le id de l'hopital
    public function getValidationRendezvous($id,$hopital){
        $query = $this->_db->query("SELECT * FROM rendezvous WHERE idPatient = ".$id." AND idHopital = ".$hopital."");
        $rendezvous = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $rendezvous[] = new rendezvous($data);
        }     
        return $rendezvous;  
    }

    //Fonction qui selectionne un rendez vous selon le id du patient
    public function getPatientRendezvous($id){
        $query = $this->_db->query("SELECT * FROM rendezvous WHERE idPatient = ".$id."");
        $rendezvous = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $rendezvous[] = new rendezvous($data);
        }     
        return $rendezvous;  
    }

    //Fonction qui modif un rendez vous selon son id 
    public function updateRendezvous(rendezvous $rendezvous) 
    {
        $query = $this->_db->prepare("UPDATE rendezvous SET idShedule = (:idPatient) WHERE idRendezvous = (:idRendezvous)"); 
        $query->bindValue(":idPatient",$rendezvous->getIdShedule());
        $query->bindValue(":idRendezvous",$rendezvous->getIdRendezvous());
        $query->execute();
    }

    //Fonction qui supprime un rendez vous selon son id
    public function supprimer(rendezvous $rendezvous){
        $query = $this->_db->prepare("DELETE FROM rendezvous WHERE idRendezvous =(:idRendezvous)"); 
        $query->bindValue(":idRendezvous",$rendezvous->getIdRendezvous());
        $query->execute();
    }

    //Fonction qui cree un rendez
    public function insertion(rendezvous $rendezvous) 
    {
        $query = $this->_db->prepare("INSERT into rendezvous(idEmployer,idHopital,idPatient,idShedule) VALUES (:idEmployer,:idHopital,:idPatient,:idShedule)"); 
        $query->bindValue(":idEmployer",$rendezvous->getIdEmployer());
        $query->bindValue(":idHopital",$rendezvous->getIdHopital());
        $query->bindValue(":idPatient",$rendezvous->getIdPatient());
        $query->bindValue(":idShedule",$rendezvous->getIdShedule());
        $query->execute();
    }
}