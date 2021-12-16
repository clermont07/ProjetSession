<?php
    class employer 
    {
        private $_idEmployer,$_nom,$_prenom,$_courriel,$_idDepartement,$_idHopital,$_photo,$_pseudo,$_motDePasse,$_idPoste;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getIdPoste(){            return $this->_idPoste;}
        public function setIdPoste($idPoste){              $this->_idPoste = $idPoste;} 

        public function getMotDePasse(){            return $this->_motDePasse;}
        public function setMotDePasse($motDePasse){              $this->_motDePasse = $motDePasse;} 

        public function getPseudo(){            return $this->_pseudo;}
        public function setPseudo($pseudo){              $this->_pseudo = $pseudo;} 

        public function getPhoto(){            return $this->_photo;}
        public function setPhoto($photo){              $this->_photo = $photo;} 

        public function getIdHopital(){            return $this->_idHopital;}
        public function setIdHopital($idHopital){              $this->_idHopital = $idHopital;} 

        public function getIdEmployer(){  return $this->_idEmployer;}
        public function setIdEmployer ($idEmployer){$this->_idEmployer = $idEmployer;} 

        public function getNom(){            return $this->_nom;}
        public function setNom($nom){              $this->_nom = $nom;} 

        public function getPrenom(){            return $this->_prenom;}
        public function setPrenom($prenom){              $this->_prenom = $prenom;} 

        public function getCourriel(){            return $this->_courriel;}
        public function setCourriel($courriel){              $this->_courriel = $courriel;} 

        public function getIdDepartement(){            return $this->_idDepartement;}
        public function setIdDepartement($idDepartement){              $this->_idDepartement = $idDepartement;} 

        public function hydrate(array $donnee){
            foreach($donnee as $key => $value){
                $method = 'set'.ucfirst($key);
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }
    }
?>