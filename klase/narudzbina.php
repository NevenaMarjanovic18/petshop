<?php
class Narudzbina{
    private $id;
    private $ime;
    private $prezime;
    private $adresa;
    private $telefon;

    public function __construct( $id,  $ime,  $prezime,  $adresa, $telefon)
    {
        $this->id=$id;
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->adresa=$adresa;
        $this->telefon=$telefon;
    }

    function getId(){
        return $this->id;
    }
    function getIme(){
        return $this->ime;
    }
    function getPrezime(){
        return $this->prezime;
    }
    function getAdresa(){
        return $this->adresa;
    }
    function getTelefon(){
        return $this->telefon;
    }
}

?>