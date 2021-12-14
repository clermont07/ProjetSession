<?php
    class departement 
    {
        private $_idDepartement,$_departement;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getIdDepartement(){  return $this->_idDepartement;}
        public function setIdDepartement ($idDepartement){$this->_idDepartement = $idDepartement;} 

        public function getDepartement(){            return $this->_departement;}
        public function setDepartement($departement){              $this->_departement = $departement;} 

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