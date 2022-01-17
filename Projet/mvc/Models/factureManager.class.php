<?php
class factureManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){        $this->setDb($db);    }
    
    public function setDb($db){        $this->_db = $db;    }
    public function getDB(){        return $this->_db;    }
    
    //Fonction qui insere une facture
    public function Insert(facture $facture) 
    {
        $query = $this->_db->prepare("INSERT into facture(Date,Tps,Tvq,AvantTaxe,PrixTotal,idPatient,idHopital,idEmployer) VALUES
         (:date,:tps,:tvq,:avantTaxe,:prixTotal,:idPatient,:idHopital,:idEmployer)"); 
        $query->bindValue(":date",$facture->getDate());
        $query->bindValue(":avantTaxe",$facture->getAvantTaxe());
        $query->bindValue(":tps",$facture->getTps());
        $query->bindValue(":tvq",$facture->getTvq());
        $query->bindValue(":prixTotal",$facture->getPrixTotal());
        $query->bindValue(":idPatient",$facture->getIdPatient());
        $query->bindValue(":tvq",$facture->getTvq());
        $query->bindValue(":prixTotal",$facture->getPrixTotal());
        $query->bindValue(":idHopital",$facture->getIdHopital());
        $query->bindValue(":idEmployer",$facture->getIdEmployer());
        $query->execute();
    }

    //Fonction qui selectionne une facture selon son id
    public function getFacture($id){
        $query = $this->_db->query("SELECT * FROM facture WHERE idPatient = ".$id."");
        $facture = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $facture[] = new facture($data);
        }     
        return $facture;  
    }
}