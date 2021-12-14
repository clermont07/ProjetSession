<?php
    class poste 
    {
        private $_idPoste,$_poste;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getIdPoste(){  return $this->_idPoste;}
        public function setIdPoste ($idPoste){$this->_idPoste = $idPoste;} 

        public function getPoste(){            return $this->_poste;}
        public function setPoste($poste){              $this->_poste = $poste;} 

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