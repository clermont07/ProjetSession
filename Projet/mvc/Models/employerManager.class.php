<?php
class employerManager{
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

    public function getEmployerLog(employer $employer) 
    {
        $pseudo = $employer->getPseudo();
        $req = $this->_db->query("SELECT  idPoste, Pseudo ,idEmployer, MotDePasse FROM employer WHERE  Pseudo='".$pseudo."'");
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if($data != Null){
            $objet = new employer($data);
            return $objet;
        }
        else{
            echo '<script>alert("Veuillez vous inscrire!")</script>';
        }
    }
    
    public function getEmployer($id){
        $req = $this->_db->query("SELECT * FROM employer WHERE idEmployer = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new employer($data);
            return $obj1;
        }
        return false;
    }
    public function getNoEmployer($id){
        $query = $this->_db->query("SELECT * FROM employer WHERE idEmployer = ".$id."");
        $employer = array();
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $employer[] = new employer($data);
        }     
        return $employer;
    }
    public function getNomEmployer($nom){
        $query = $this->_db->query("SELECT * FROM employer WHERE Nom = '".$nom."'");
        $employer = array();
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $employer[] = new employer($data);
        }     
        return $employer;
    }

    public function getAllEmployer(){
        $query = $this->_db->query("SELECT * FROM employer ");
        $employer = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $employer[] = new employer($data);
        }     
        return $employer;
    }

    public function update(employer $employer) 
    {
        $query = $this->_db->prepare(" UPDATE employer SET idDepartement = (:idDepartement), Courriel = (:courriel), MotDePasse = (:motDePasse), Pseudo = (:pseudo) WHERE idEmployer=(:idEmployer)");
        $query->bindValue(":idEmployer",$employer->getIdEmployer());
        $query->bindValue(":idDepartement",$employer->getIdDepartement());
        $query->bindValue(":courriel",$employer->getCourriel());
        $query->bindValue(":pseudo",$employer->getPseudo());
        $query->bindValue(":motDePasse",$employer->getMotDePasse());
        $query->execute();
    }

    public function getInfirmiere($poste){
        $query = $this->_db->query("SELECT * FROM employer WHERE idPoste = ".$poste."");
        $employer = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $employer[] = new employer($data);
        }     
        return $employer;
    }
    public function getMedecin($poste){
        $query = $this->_db->query("SELECT * FROM employer WHERE idPoste = ".$poste."");
        $employer = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $employer[] = new employer($data);
        }     
        return $employer;  
    }
    public function getEmployerHopital($hopital){
        $query = $this->_db->query("SELECT * FROM employer WHERE idHopital = ".$hopital."");
        $employer = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
            $employer[] = new employer($data);
        }     
        return $employer;  
    }
    public function supprimer(employer $employer){
        $query = $this->_db->prepare("DELETE FROM employer WHERE idEmployer =(:idEmployer)"); 
        $query->bindValue(":idEmployer",$employer->getIdEmployer());
        $query->execute();
    }
    public function inserer(employer $employer) 
    {
        $query = $this->_db->prepare("INSERT into employer(Prenom,Nom,Courriel,Photo,Pseudo,MotDePasse,idDepartement,idHopital,idPoste) 
        VALUES (:prenom,:nom,:courriel,:photo,:pseudo,:motDePasse,:idDepartement,:idHopital,:idPoste)"); 
        $query->bindValue(":prenom",$employer->getPrenom());
        $query->bindValue(":nom",$employer->getNom());
        $query->bindValue(":courriel",$employer->getCourriel());
        $query->bindValue(":photo",$employer->getPhoto());
        $query->bindValue(":pseudo",$employer->getPseudo());
        $query->bindValue(":motDePasse",$employer->getMotDePasse());
        $query->bindValue(":idDepartement",$employer->getIdDepartement());
        $query->bindValue(":idHopital",$employer->getIdHopital());
        $query->bindValue(":idPoste",$employer->getIdPoste());
        $query->execute();
    }
}