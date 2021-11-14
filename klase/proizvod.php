<?php
class Proizvod{
    private $id;
    private $naziv;
    private $opis;
    private $cena;
    private $slika;
    private $kategorija_id;

    public function __construct( $id, $naziv, $opis,$cena, $slika, $kategorija_id)
    {
        $this->id=$id;
        $this->naziv=$naziv;
        $this->opis=$opis;
        $this->cena=$cena;
        $this->slika=$slika;
        $this->kategorija_id=$kategorija_id;
    }

    function getId(){
        return $this->id;
    }
    function getNaziv(){
        return $this->naziv;
    }
    function getOpis(){
        return $this->opis;
    }
    function getCena(){
        return $this->cena;
    }
    function getSlika(){
        return $this->slika;
    }
    function getKategorijaId(){
        return $this->kategorija_id;
    }

}

?>