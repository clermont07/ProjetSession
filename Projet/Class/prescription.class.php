<?php
    class prescription 
    {
        private $_idPrescription,$_date,$_description;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getIdPrescription(){  return $this->_idPrescription;}
        public function setIdPrescription ($idPrescription){$this->_idPrescription = $idPrescription;} 

        public function getDate(){            return $this->_date;}
        public function setDate($date){              $this->_date = $date;} 

        public function getDescription(){            return $this->_description;}
        public function setDescription($description){              $this->_description = $description;} 

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