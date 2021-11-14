<?php
class Kategorija{
    private $id;
    private $naziv;
  
    public function __construct( $id,  $naziv)
    {
        $this->id=$id;
        $this->naziv=$naziv;
       

    }
    
    function getId(){
        return $this->id;
    }
    function getNaziv(){
        return $this->naziv;
    }
}

?>