<?php
    class facture 
    {
        private $_idFacture,$_date,$_tps,$_tvq,$_prixTotal,$_avantTaxe,$_idPatient,$_idEmployer,$_idHopital;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }
        public function getIdHopital(){            return $this->_idHopital;}
        public function setIdHopital($idHopital){              $this->_idHopital = $idHopital;} 

        public function getIdEmployer(){  return $this->_idEmployer;}
        public function setIdEmployer ($idEmployer){$this->_idEmployer = $idEmployer;} 

        public function getIdPatient(){            return $this->_idPatient;}
        public function setIdPatient($idPatient){              $this->_idPatient = $idPatient;} 

        public function getAvantTaxe(){            return $this->_avantTaxe;}
        public function setAvantTaxe($avantTaxe){              $this->_avantTaxe = $avantTaxe;} 

        public function getIdFacture(){  return $this->_idFacture;}
        public function setIdFacture ($idFacture){$this->_idFacture = $idFacture;} 

        public function getDate(){            return $this->_date;}
        public function setDate($date){              $this->_date = $date;} 

        public function getTps(){            return $this->_tps;}
        public function setTps($tps){              $this->_tps = $tps;} 

        public function getTvq(){            return $this->_tvq;}
        public function setTvq($tvq){              $this->_tvq = $tvq;} 

        public function getPrixTotal(){            return $this->_prixTotal;}
        public function setPrixTotal($prixTotal){              $this->_prixTotal = $prixTotal;} 

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