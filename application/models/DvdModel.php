<?php

class DvdModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getDvdCategories(){
        $this->db->select('nazev, id');
        $this->db->from('kategorie');

        return $this->db->get()->result();
    }

    public function getDvdKategorieById($ID){
        $this->db->select('nazev');
        $this->db->from('kategorie');
        $this->db->where('id', $ID);

        $result = $this->db->get()->result();

        return $result[0]->nazev;
    }
    
    public function getSeznamDvdPodleKategorie($ID){
        $this->db->select('
            dvd.nazev,
            vydavatel.nazev as nazevVydavatele, 
            vydavatel.id as vydavatelID,
            reziser.jmeno as reziserJmeno,
            reziser.id as reziserID,
            rok_vydani
        ');
        $this->db->from('dvd');
        $this->db->where('druh', $ID);
        $this->db->join('vydavatel', 'vydavatel.id = dvd.id_vydavatel', 'inner');
        $this->db->join('reziser', 'reziser.id = dvd.id_reziser', 'inner');

        return $this->db->get()->result();
    }

    public function getSeznamDvdPodleVydavatel($ID){
        $this->db->select('
            dvd.nazev,
            kategorie.nazev as nazevKategorie,
            kategorie.id as kategorieID,
            vydavatel.nazev as nazevVydavatel,
            reziser.jmeno as reziserJmeno,
            reziser.id as reziserID,
            rok_vydani
        ');
        $this->db->from('dvd');
        $this->db->where('id_vydavatel', $ID);
        $this->db->join('kategorie', 'kategorie.id = dvd.druh', 'inner');
        $this->db->join('reziser', 'reziser.id = dvd.id_reziser', 'inner');
        $this->db->join('vydavatel', 'vydavatel.id = dvd.id_vydavatel', 'inner');

        return $this->db->get()->result();
    }

    public function getSeznamDvdPodleReziser($ID){
        $this->db->select('
            dvd.nazev,
            kategorie.nazev as nazevKategorie,
            kategorie.id as kategorieID,
            vydavatel.nazev as nazevVydavatel,
            vydavatel.id as vydavatelID,
            reziser.jmeno as reziserJmeno,
            rok_vydani,
            stat.vlajka
        ');
        $this->db->from('dvd');
        $this->db->where('id_reziser', $ID);
        $this->db->join('kategorie', 'kategorie.id = dvd.druh', 'inner');
        $this->db->join('reziser', 'reziser.id = dvd.id_reziser', 'inner');
        $this->db->join('vydavatel', 'vydavatel.id = dvd.id_vydavatel', 'inner');
        $this->db->join('stat', 'stat.id = reziser.id_zeme', 'inner');

        return $this->db->get()->result();
    }

    public function getSeznamDvdPodleRok($rok){
        $this->db->select('
            dvd.nazev,
            kategorie.nazev as nazevKategorie,
            kategorie.id as kategorieID,
            vydavatel.nazev as nazevVydavatel,
            vydavatel.id as vydavatelID,
            reziser.jmeno as reziserJmeno,
            reziser.id as reziserID
        ');
        $this->db->from('dvd');
        $this->db->where('rok_vydani', $rok);
        $this->db->join('kategorie', 'kategorie.id = dvd.druh', 'inner');
        $this->db->join('reziser', 'reziser.id = dvd.id_reziser', 'inner');
        $this->db->join('vydavatel', 'vydavatel.id = dvd.id_vydavatel', 'inner');

        return $this->db->get()->result();
    }

    public function getAmountOfCategories(){
        $query = $this->db->query('SELECT druh, count(druh) as amount FROM dvd GROUP by druh')->result();
        
        $result = [];

        foreach ($query as $obj){
            $result[$obj->druh] = $obj->amount;
    
        }

        return $result;
    }
}

?>