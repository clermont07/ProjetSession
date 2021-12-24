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
        $motDePasse = $employer->getMotDePasse();
        $req = $this->_db->query("SELECT  idPoste, Pseudo ,idEmployer, MotDePasse FROM employer WHERE  Pseudo='".$pseudo."' AND MotDePasse='".$motDePasse."'");
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
}