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

        $req = $this->_db->query("SELECT  idPoste, Pseudo , MotDePasse FROM employer WHERE  Pseudo='".$pseudo."' AND MotDePasse='".$motDePasse."'");
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if($data != Null){
            $objet = new employer($data);
            return $objet;
        }
        else{
            echo '<script>alert("Veuillez vous inscrire!")</script>';
        }
    }

}