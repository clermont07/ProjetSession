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

        $req = $this->_db->query("SELECT idPatient,Pseudo , MotDePasse FROM patient WHERE  Pseudo='".$pseudo."' AND MotDePasse='".$motDePasse."'");
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if($data != Null){
            $objet = new patient($data);
            return $objet;
        }
        else{
            echo '<script>alert("Veuillez vous inscrire!")</script>';
        }
    }

    public function getPatient($id){
        $req = $this->_db->query("SELECT * FROM patient WHERE idPatient = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new patient($data);
            return $obj1;
        }
        return false;
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

    public function gestionPatientModifier(patient $patient) 
    {
        $query = $this->_db->prepare("UPDATE patient SET Description = (:description),Prenom = (:prenom),Nom = (:nom),Telephone = (:telephone),Adresse = (:adresse),Ville = (:ville),CodePostal = (:codePostal),idSexe = (:sexe),idGrpSang = (:grpSang),AssuranceMaladie = (:assuranceMaladie),PaysNaissance = (:paysNaissance),DateNaissance = (:dateNaissance),Pseudo = (:pseudo),MotDePasse = (:motDePasse) WHERE idPatient = (:idPatient)"); 
        $query->bindValue(":idPatient",$patient->getIdPatient());
        $query->bindValue(":description",$patient->getDescription());
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
    public function Modifier(patient $patient) 
    {
        $query = $this->_db->prepare("UPDATE patient SET Prenom = (:prenom),Nom = (:nom),Telephone = (:telephone),Adresse = (:adresse),Ville = (:ville),CodePostal = (:codePostal),idSexe = (:sexe),idGrpSang = (:grpSang),AssuranceMaladie = (:assuranceMaladie),PaysNaissance = (:paysNaissance),DateNaissance = (:dateNaissance),Pseudo = (:pseudo),MotDePasse = (:motDePasse) WHERE idPatient = (:idPatient)"); 
        $query->bindValue(":idPatient",$patient->getIdPatient());
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

    public function gestionPatientInsertion(patient $patient) 
    {
        $query = $this->_db->prepare("INSERT into patient(Description,Prenom,Nom,Telephone,Adresse,Ville,CodePostal,idSexe,idGrpSang,AssuranceMaladie,PaysNaissance,DateNaissance,Pseudo,MotDePasse) VALUES (:description,:prenom,:nom,:telephone,:adresse,:ville,:codePostal,:sexe,:grpSang,:assuranceMaladie,:paysNaissance,:dateNaissance,:pseudo,:motDePasse)"); 
        $query->bindValue(":description",$patient->getDescription());
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

    public function getGestionPatient(patient $patient){
        $assurance = $patient->getAssuranceMaladie();

        $req = $this->_db->query("SELECT * FROM patient WHERE AssuranceMaladie = '".$assurance."'");
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if($data != Null){
            $objet = new patient($data);
            return $objet;
        }
        else{
            echo '<script>alert("Se patient ne fait pas parti du sytème hopital!")</script>';
        }
    }
}