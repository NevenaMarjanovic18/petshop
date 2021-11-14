<?php
class Stavka{
    private $porudzbina_id;
    private $proizvod_id;


    public function __construct( $porudzbina_id, $proizvod_id)
    {
        $this->porudzbina_id=$porudzbina_id;
        $this->proizvod_id=$proizvod_id;
    }

    function getporudzbina_id(){
        return $this->porudzbina_id;
    }
    function getproizvod_id(){
        return $this->proizvod_id;
    }
    

}

?>