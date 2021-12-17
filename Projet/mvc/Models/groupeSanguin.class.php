<?php
    class groupeSanguin 
    {
        private $_idGroupeSanguin,$_groupeSanguin;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getIdGrpSang(){  return $this->_idGroupeSanguin;}
        public function setIdGrpSang ($idGroupeSanguin){$this->_idGroupeSanguin = $idGroupeSanguin;} 

        public function getGroupeSanguin(){            return $this->_groupeSanguin;}
        public function setGroupeSanguin($groupeSanguin){              $this->_groupeSanguin = $groupeSanguin;} 

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