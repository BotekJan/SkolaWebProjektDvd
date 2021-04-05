<?php

class DvdController extends CI_Controller
{
	var $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DvdModel');
		$this->data["dropdown"] = $this->DvdModel->getDvdCategories();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function dvd($pocetNaStranku, $cisloStranky )
	{

		$config['base_url'] = base_url('dvd/'.$pocetNaStranku.'/');
		$config['total_rows'] = $this->DvdModel->getAmountOfDvd();
		$config['per_page'] = $pocetNaStranku;
		$config['uri_segment'] = 3;
		$config['first_url'] = $config['base_url'].'1';
		$this->config->load('pagination');

		$cisloStranky -= 1;

		$this->pagination->initialize($config);

		$this->data["dvd"] = $this->DvdModel->getAllDvdForPagination($cisloStranky, $config["per_page"]);

		$this->data["title"] = "všechna dvd";
		$this->data["main"] = "DvdStrankovaniView";
		$this->layout->generate($this->data);
	}

	public function kategorie()
	{
		$this->data["kategorie"] = $this->DvdModel->getDvdCategories();

		$this->data["title"] = "Kategorie DVD";
		$this->data["main"] = "KategorieTabulkaView";
		$this->data["amount"] = $this->DvdModel->getAmountOfCategories();
		$this->layout->generate($this->data);
	}

	public function seznamDvd($ID)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleKategorie($ID);
		$this->data["nazevKategorie"] = $this->DvdModel->getDvdKategorieById($ID);
		$this->data["title"] = "DVD z kategorie " . $this->data["nazevKategorie"];
		$this->data["main"] = "DvdTabulkaView";
		$this->layout->generate($this->data);
	}

	public function kartyDvd($ID)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleKategorie($ID);
		$this->data["nazevKategorie"] = $this->DvdModel->getDvdKategorieById($ID);
		$this->data["title"] = "DVD z kategorie " . $this->data["nazevKategorie"];
		$this->data["main"] = "DvdKartyView";
		$this->layout->generate($this->data);
	}

	public function vydavatel($ID)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleVydavatel($ID);
		$this->data["nazevVydavatel"] = $this->data["dvd"][0]->nazevVydavatel;
		$this->data["title"] = "Dvd od vydavatele " . $this->data["nazevVydavatel"];
		$this->data["main"] = "VydavatelFilmyView";
		$this->layout->generate($this->data);
	}

	public function kartyVydavatel($ID)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleVydavatel($ID);
		$this->data["nazevVydavatel"] = $this->data["dvd"][0]->nazevVydavatel;
		$this->data["title"] = "Dvd od vydavatele " . $this->data["nazevVydavatel"];
		$this->data["main"] = "VydavatelKartyView";
		$this->layout->generate($this->data);
	}

	public function reziser($ID)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleReziser($ID);
		$this->data["nazevReziser"] = $this->data["dvd"][0]->reziserJmeno;
		$this->data["vlajka"] = '<img src="' . base_url() . 'assets/vlajky/' . $this->data["dvd"][0]->vlajka . '.svg" style="height: 50px">';
		$this->data["title"] = "Dvd od rezisera " . $this->data["nazevReziser"];
		$this->data["main"] = "ReziserFilmyView";
		$this->layout->generate($this->data);
	}

	public function kartyReziser($ID)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleReziser($ID);
		$this->data["nazevReziser"] = $this->data["dvd"][0]->reziserJmeno;
		$this->data["vlajka"] = '<img src="' . base_url() . 'assets/vlajky/' . $this->data["dvd"][0]->vlajka . '.svg" style="height: 50px">';
		$this->data["title"] = "Dvd od rezisera " . $this->data["nazevReziser"];
		$this->data["main"] = "ReziserKartyView";
		$this->layout->generate($this->data);
	}

	public function rok($rok)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleRok($rok);
		$this->data["rok"] = $rok;
		$this->data["title"] = "Dvd z roku " . $rok;
		$this->data["main"] = "FilmyPodleRokuView";
		$this->layout->generate($this->data);
	}

	public function rokKarty($rok)
	{
		$this->data["dvd"] = $this->DvdModel->getSeznamDvdPodleRok($rok);
		$this->data["rok"] = $rok;
		$this->data["title"] = "Dvd z roku " . $rok;
		$this->data["main"] = "RokKartyView";
		$this->layout->generate($this->data);
	}
}
