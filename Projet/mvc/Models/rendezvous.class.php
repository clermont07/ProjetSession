<?php
    class rendezvous 
    {
        private $_idRendezvous,$_idPatient,$_idShedule,$_idEmployer,$_idHopital;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }
        public function getIdHopital(){            return $this->_idHopital;}
        public function setIdHopital($idHopital){              $this->_idHopital = $idHopital;} 

        public function getIdEmployer(){  return $this->_idEmployer;}
        public function setIdEmployer ($idEmployer){$this->_idEmployer = $idEmployer;} 

        public function getIdShedule(){  return $this->_idShedule;}
        public function setIdShedule ($idShedule){$this->_idShedule = $idShedule;} 

        public function getIdRendezvous(){  return $this->_idRendezvous;}
        public function setIdRendezvous ($idRendezvous){$this->_idRendezvous = $idRendezvous;} 

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