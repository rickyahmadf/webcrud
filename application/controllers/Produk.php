<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
        $this->load->library('form_validation');
        $data['nama'] = "Ricky Ahmad";
        $data['alamat'] = "Jl. Tanmalaka Ciborelang";
        $data['tanggal'] = date('d-m-Y');
        $data['list_produk'] = array(1=> 'Mie Goreng', 'Nasi Goreng', 'Capcay');

		$this->load->view('belanja', $data);
	}

    public function list_produk()
    {
        $this->load->view('list_produk');
    }

    public function proses()
    {
        $nama = $this->input->post('nama');
        $topup = $this->input->post('topup');

        // Mengambil fungsi validasi form
        $this->load->library('form_validation');

        // validasi form
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[5]');
        $this->form_validation->set_rules('topup', 'Saldo Top up', 'required');

        if ($this->form_validation->run() == FALSE){
            // Jika hasil validasi bernilai salah/false, maka kembali ke form
        $data['nama'] = "Ricky Ahmad";
        $data['alamat'] = "Jl. Tanmalaka Ciborelang";
        $data['tanggal'] = date('d-m-Y');
        $data['list_produk'] = array(1=> 'Mie Goreng', 'Nasi Goreng', 'Capcay');

        $this->load->view('belanja', $data);
        } else {

        // Jika hasil validasi benar (diisi), maka tampilkan views proses

        $data['nama'] = $nama;
        $data['topup'] = $topup;
        $saldo_awal = 1000000;
        $saldo_akhir = $saldo_awal + $topup;
        $data['saldo_awal'] = $saldo_awal;
        $data['saldo_akhir'] = $saldo_akhir;
    

        $this->load->view('proses', $data);
        }
    }
}
