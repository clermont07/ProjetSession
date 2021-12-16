<?php
    class rendezvous 
    {
        private $_idRendezvous,$_idPatient;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

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