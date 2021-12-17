<?php
class patientManager{
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
    
    public function getPatientLog(patient $patient) 
    {
        $pseudo = $patient->getPseudo();
        $motDePasse = $patient->getMotDePasse();

        $req = $this->_db->query("SELECT Pseudo , MotDePasse FROM patient WHERE  Pseudo='".$pseudo."' AND MotDePasse='".$motDePasse."'");
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if($data != Null){
            $objet = new patient($data);
            return $objet;
        }
        else{
            echo '<script>alert("Veuillez vous inscrire!")</script>';
        }
    }

    public function insertion(patient $patient) 
    {
        $query = $this->_db->prepare("INSERT into patient(Prenom,Nom,Telephone,Adresse,Ville,CodePostal,idSexe,idGrpSang,AssuranceMaladie,PaysNaissance,DateNaissance,Pseudo,MotDePasse) VALUES (:prenom,:nom,:telephone,:adresse,:ville,:codePostal,:sexe,:grpSang,:assuranceMaladie,:paysNaissance,:dateNaissance,:pseudo,:motDePasse)"); 
        $query->bindValue(":prenom",$patient->getPrenom());
        $query->bindValue(":nom",$patient->getNom());
        $query->bindValue(":telephone",$patient->getTelephone());
        $query->bindValue(":adresse",$patient->getAdresse());
        $query->bindValue(":ville",$patient->getVille());
        $query->bindValue(":codePostal",$patient->getCodePostal());
        $query->bindValue(":sexe",$patient->getIdSexe());
        $query->bindValue(":grpSang",$patient->getIdGrpSang());
        $query->bindValue(":assuranceMaladie",$patient->getAssuranceMaladie());
        $query->bindValue(":paysNaissance",$patient->getPaysNaissance());
        $query->bindValue(":dateNaissance",$patient->getDateNaissance());
        $query->bindValue(":pseudo",$patient->getPseudo());
        $query->bindValue(":motDePasse",$patient->getMotDePasse());
        $query->execute();
        
    }
}