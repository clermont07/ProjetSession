<?php
    class sexe 
    {
        private $_idSexe,$_genre;

        public function __construct(array $donnee = array()){
            if(!empty($donnee)){
                $this->hydrate($donnee);
            }
        }

        public function getIdSexe(){  return $this->_idSexe;}
        public function setIdSexe ($idSexe){$this->_idSexe = $idSexe;} 

        public function getGenre(){            return $this->_genre;}
        public function setGenre($genre){              $this->_genre = $genre;} 

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