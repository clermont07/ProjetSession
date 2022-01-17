<?php
class hopitalManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    public function setDb($db){        $this->_db = $db;    }    
    public function getDB(){        return $this->_db;    }

    //Fonction qui selectionne tous les hopitaux
    public function getAllHopital(){
        $query = $this->_db->query("SELECT * FROM hopital ");
        $hopital = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $hopital[] = new hopital($data);
        }     
        return $hopital;  
    }

    //Fonction qui selectionne un hopital selon son id
    public function getHopital($id){
        $req = $this->_db->query("SELECT * FROM hopital WHERE idHopital = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new hopital($data);
            return $obj1;
        }
        return false;
    }

    //Fonction qui modif un hopital selon son id
    public function update(hopital $hopital) 
    {
        $query = $this->_db->prepare(" UPDATE hopital SET Nom = (:nom), Adresse = (:adresse), Ville = (:ville), CodePostal = (:codePostal), Telephone = (:telephone) WHERE idHopital=(:idHopital)");
        $query->bindValue(":idHopital",$hopital->getIdHopital());
        $query->bindValue(":nom",$hopital->getNom());
        $query->bindValue(":adresse",$hopital->getAdresse());
        $query->bindValue(":ville",$hopital->getVille());
        $query->bindValue(":telephone",$hopital->getTelephone());
        $query->bindValue(":codePostal",$hopital->getCodePostal());
        $query->execute();
    }
}