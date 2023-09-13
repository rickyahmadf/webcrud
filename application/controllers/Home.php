<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('profil');
	}

    public function kontak()
    {
        $this->load->view('kontak');
    }

    public function umur($usia)
    {
        $data['umur_sekarang'] = $usia;
        $data['nama_lengkap'] = "Budi Haryono";
        $this->load->view('usia', $data);
    }
}
