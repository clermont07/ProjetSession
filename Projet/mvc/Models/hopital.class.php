<?php
    class hopital 
    {
        private $_idHopital,$_nom,$_adresse,$_ville,$_codePostal,$_telephone,$_photo;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getCodePostal(){            return $this->_codePostal;}
        public function setCodePostal($codePostal){              $this->_codePostal = $codePostal;} 
        
        public function getTelephone(){            return $this->_telephone;}
        public function setTelephone($telephone){              $this->_telephone = $telephone;} 

        public function getVille(){            return $this->_ville;}
        public function setVille($ville){              $this->_ville = $ville;} 

        public function getAdresse(){            return $this->_adresse;}
        public function setAdresse($adresse){              $this->_adresse = $adresse;} 

        public function getIdHopital(){            return $this->_idHopital;}
        public function setIdHopital($idHopital){              $this->_idHopital = $idHopital;} 

        public function getNom(){            return $this->_nom;}
        public function setNom($nom){              $this->_nom = $nom;} 

        public function getPhoto(){            return $this->_photo;}
        public function setPhoto($photo){              $this->_photo = $photo;} 

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