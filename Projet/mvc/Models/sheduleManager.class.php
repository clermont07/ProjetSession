<?php
class sheduleManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){        $this->setDb($db);    }
    
    public function setDb($db){        $this->_db = $db;    }    
    public function getDB(){        return $this->_db;    }

    //Fonction qui insere une shedule
    public function insertion(shedule $shedule) 
    {
        $query = $this->_db->prepare("INSERT into shedule(Jour,NoEmployer,Shedule,Frais,maxPatient,cmpPatient,Disponibilite) VALUES 
        (:Jour,:NoEmployer,:Shedule,:Frais,:maxPatient,:maxPatient,1)"); 
        $query->bindValue(":Shedule",$shedule->getShedule());
        $query->bindValue(":NoEmployer",$shedule->getNoEmployer());
        $query->bindValue(":Jour",$shedule->getJour());
        $query->bindValue(":Frais",$shedule->getFrais());
        $query->bindValue(":maxPatient",$shedule->getMaxPatient());
        $query->execute();
    }

    //Fonction qui selectionne une shedule selon son id
    public function getIdShedule($id){
        $req = $this->_db->query("SELECT * FROM shedule WHERE idShedule = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new shedule($data);
            return $obj1;
        }
        return false;
    }
    
    //Fonction qui selectionne les shedules selon l'id d'un employer
    public function getShedule($id){
        $query = $this->_db->query("SELECT * FROM shedule WHERE NoEmployer = ".$id."");
        $shedule = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $shedule[] = new shedule($data);
        }     
        return $shedule;  
    }

    //Fonction qui selectionne les shedules selon l'id d'un employer et s'il est disponible
    public function getSheduleDispo($id){
        $query = $this->_db->query("SELECT * FROM shedule WHERE NoEmployer = ".$id." AND Disponibilite > 0");
        $shedule = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $shedule[] = new shedule($data);
        }     
        return $shedule;  
    }

    //Fonction qui supprime une shedule selon son id 
    public function supprimer(shedule $shedule){
        $query = $this->_db->prepare("DELETE FROM shedule WHERE idShedule=(:idShedule)"); 
        $query->bindValue(":idShedule",$shedule->getIdShedule());
        $query->execute();
    }

    //Fonction qui modif le cmpPatient d'une shedule selon son id 
    public function updateCmp(shedule $shedule) 
    {
        $query = $this->_db->prepare("UPDATE shedule SET cmpPatient = (:cmpPatient) WHERE idShedule = (:idShedule)"); 
        $query->bindValue(":idShedule",$shedule->getIdShedule());
        $query->bindValue(":cmpPatient",$shedule->getCmpPatient());
        $query->execute();
    }

    //Fonction qui modif la disponibiliter d'une shedule selon son id 
    public function updateDisponibilite(shedule $shedule) 
    {
        $query = $this->_db->prepare("UPDATE shedule SET Disponibilite = (:Disponibilite) WHERE idShedule = (:idShedule)"); 
        $query->bindValue(":Disponibilite",$shedule->getDisponibilite());
        $query->bindValue(":idShedule",$shedule->getIdShedule());
        $query->execute();
    }
}