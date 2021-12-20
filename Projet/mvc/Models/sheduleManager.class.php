<?php
class sheduleManager{
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
    
    public function getShedule($id){
        $query = $this->_db->query("SELECT * FROM shedule WHERE NoEmployer = ".$id."");
        $shedule = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $shedule[] = new shedule($data);
        }     
        return $shedule;  
    }

    public function supprimer(shedule $shedule){
        echo $shedule->getIdShedule();
        $query = $this->_db->prepare("DELETE FROM shedule WHERE idShedule=(:idShedule)"); 
        $query->bindValue(":idShedule",$shedule->getIdShedule());
        $query->execute();
    }
}