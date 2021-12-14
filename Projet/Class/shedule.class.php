<?php
    class shedule 
    {
        private $_idShedule,$_noEmployer,$_shedule,$_jour,$_frais,$_maxPatient,$_cmpPatient,$_disponibiliter;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getIdShedule(){  return $this->_idShedule;}
        public function setIdShedule ($idShedule){$this->_idShedule = $idShedule;} 

        public function getShedule(){  return $this->_shedule;}
        public function setShedule ($shedule){$this->_shedule = $shedule;} 

        public function getDisponibiliter(){  return $this->_disponibiliter;}
        public function setDisponibiliter ($disponibiliter){$this->_disponibiliter = $disponibiliter;} 

        public function getCmpPatient(){  return $this->_cmpPatient;}
        public function setCmpPatient ($cmpPatient){$this->_cmpPatient = $cmpPatient;} 

        public function getMaxPatient(){  return $this->_maxPatient;}
        public function setMaxPatient ($maxPatient){$this->_maxPatient = $maxPatient;} 

        public function getFrais(){  return $this->_frais;}
        public function setFrais ($frais){$this->_frais = $frais;} 

        public function getJour(){  return $this->_jour;}
        public function setJour ($jour){$this->_jour = $jour;} 

        public function getNoEmployer(){            return $this->_noEmployer;}
        public function setNoEmployer($noEmployer){              $this->_noEmployer = $noEmployer;} 

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