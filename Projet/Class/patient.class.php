<?php
    class patient 
    {
        private $_idPatient,$_nom,$_prenom,$_telephone,$_dateNaissance,$_idSexe,$_idGroupeSanguin,$_courriel,$_paysNaissance,$_idPrescription,$_adresse,$_codePostal,$_ville,$_idFacture,$_idHopital,$_idEmployer,$_description,$_motDePasse,$_pseudo,$_assuranceMaladie;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getAssuranceMaladie(){            return $this->_assuranceMaladie;}
        public function setAssuranceMaladie($assuranceMaladie){              $this->_assuranceMaladie = $assuranceMaladie;} 

        public function getPseudo(){            return $this->_pseudo;}
        public function setPseudo($pseudo){              $this->_pseudo = $pseudo;} 

        public function getMotDePasse(){            return $this->_motDePasse;}
        public function setMotDePasse($motDePasse){              $this->_motDePasse = $motDePasse;} 

        public function getDescription(){  return $this->_description;}
        public function setDescription ($description){$this->_description = $description;} 

        public function getIdEmployer(){  return $this->_idEmployer;}
        public function setIdEmployer ($idEmployer){$this->_idEmployer = $idEmployer;} 

        public function getIdFacture(){  return $this->_idFacture;}
        public function setIdFacture ($idFacture){$this->_idFacture = $idFacture;} 

        public function getVille(){            return $this->_ville;}
        public function setVille($ville){              $this->_ville = $ville;} 

        public function getCodePostal(){            return $this->_codePostal;}
        public function setCodePostal($codePostal){              $this->_codePostal = $codePostal;} 

        public function getAdresse(){            return $this->_adresse;}
        public function setAdresse($adresse){              $this->_adresse = $adresse;} 

        public function getIdPrescription(){  return $this->_idPrescription;}
        public function setIdPrescription ($idPrescription){$this->_idPrescription = $idPrescription;} 

        public function getPaysNaissance(){            return $this->_paysNaissance;}
        public function setPaysNaissance($paysNaissance){              $this->_paysNaissance = $paysNaissance;} 

        public function getCourriel(){            return $this->_courriel;}
        public function setCourriel($courriel){              $this->_courriel = $courriel;} 

        public function getIdGroupeSanguin(){  return $this->_idGroupeSanguin;}
        public function setIdGroupeSanguin ($idGroupeSanguin){$this->_idGroupeSanguin = $idGroupeSanguin;} 

        public function getIdSexe(){  return $this->_idSexe;}
        public function setIdSexe ($idSexe){$this->_idSexe = $idSexe;} 

        public function getDateNaissance(){            return $this->_dateNaissance;}
        public function setDateNaissance($dateNaissance){              $this->_dateNaissance = $dateNaissance;} 

        public function getTelephone(){            return $this->_telephone;}
        public function setTelephone($telephone){              $this->_telephone = $telephone;} 

        public function getIdHopital(){            return $this->_idHopital;}
        public function setIdHopital($idHopital){              $this->_idHopital = $idHopital;} 

        public function getPrenom(){            return $this->_prenom;}
        public function setPrenom($prenom){              $this->_prenom = $prenom;} 

        public function getNom(){            return $this->_nom;}
        public function setNom($nom){              $this->_nom = $nom;} 

        public function getIdPatient(){            return $this->_idPatient;}
        public function setIdPatient($idPatient){              $this->_idPatient = $idPatient;} 

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