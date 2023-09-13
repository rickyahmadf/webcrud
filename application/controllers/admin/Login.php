<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        if (isset($_SESSION['email']) == "") {
		$this->load->view('backend/vlogin');
	} else {
        redirect('admin/Login/dashboard');
    }
    }

    function dashboard()
    {
        $this->load->view('backend/dashboard');
    }


    // Untuk menemukan validasi username dan password ke tabel user
    public function validasi()
	{
        // load model user
        $this->load->model('Muser');

	$email = $this->input->post('email');
	$kata_sandi = $this->input->post('kata_sandi');

    $hasil = $this->Muser->get_validasi($email, $kata_sandi);
    if ($hasil == true){
        // login sukses (username/password ccok dengan tabel)
        // echo "Sukses Gaes"; 
        $this->session->set_userdata('email', $email);
        // $SESSION['username'] = $user;
        $this->load->view('backend/dashboard');
    } else {
        // login gagal
        $this->session->set_flashdata('salah', true);
        redirect('admin/Login');
    }

	}

     function logout () {
        $this->session->unset_userdata(array('email', 'kata_sandi'));
        $this->session->sess_destroy();
		
		return redirect('admin/Login'); }

   
}
