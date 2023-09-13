<?php


class Utama extends CI_Controller {

	
	public function index()
	{
        $data['home'] = "active";
		$this->load->view('frontend/utama');
	}

    public function about()
	{
        $data['about'] = "active";
		$this->load->view('frontend/tentang');
	}
    public function kontak()
	{
        $data['kontak'] = "active";
		$this->load->view('frontend/kontak', $data);
	}

    // simpan data
    public function kontak_submit()
	{
        // Array untuk dikirimkan ke mysql
        // Array key harus sama dengan field di tabel
        $data = array (
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'perihal' => $this->input->post('perihal'),
            'pesan' => $this->input->post('pesan')
        );


        // simpan
        $this->load->model('Mkontak');
        $this->Mkontak->insert($data);
        echo "simpan data sukses";

	}
}



