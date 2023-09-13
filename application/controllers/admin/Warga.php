<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mwarga');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = @urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'warga/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'warga/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'warga/index.html';
            $config['first_url'] = base_url() . 'warga/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mwarga->total_rows($q);
        $warga = $this->Mwarga->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'warga_data' => $warga,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('warga/20_warga_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mwarga->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nik' => $row->nik,
		'nama_lengkap' => $row->nama_lengkap,
		'jenis_kelamin' => $row->jenis_kelamin,
		'no_rumah' => $row->no_rumah,
		'email' => $row->email,
		'kata_sandi' => $row->kata_sandi,
		'status' => $row->status,
		'jumlah_penghuni' => $row->jumlah_penghuni,
	    );
            $this->load->view('warga/20_warga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/warga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/warga/create_action'),
	    'id' => set_value('id'),
	    'nik' => set_value('nik'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'no_rumah' => set_value('no_rumah'),
	    'email' => set_value('email'),
	    'kata_sandi' => set_value('kata_sandi'),
	    'status' => set_value('status'),
	    'jumlah_penghuni' => set_value('jumlah_penghuni'),
	);
        $this->load->view('warga/20_warga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'no_rumah' => $this->input->post('no_rumah',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kata_sandi' => $this->input->post('kata_sandi',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jumlah_penghuni' => $this->input->post('jumlah_penghuni',TRUE),
	    );

            $this->Mwarga->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/warga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mwarga->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/warga/update_action'),
		'id' => set_value('id', $row->id),
		'nik' => set_value('nik', $row->nik),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'no_rumah' => set_value('no_rumah', $row->no_rumah),
		'email' => set_value('email', $row->email),
		'kata_sandi' => set_value('kata_sandi', $row->kata_sandi),
		'status' => set_value('status', $row->status),
		'jumlah_penghuni' => set_value('jumlah_penghuni', $row->jumlah_penghuni),
	    );
            $this->load->view('warga/20_warga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/warga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'no_rumah' => $this->input->post('no_rumah',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kata_sandi' => $this->input->post('kata_sandi',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jumlah_penghuni' => $this->input->post('jumlah_penghuni',TRUE),
	    );

            $this->Mwarga->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/warga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mwarga->get_by_id($id);

        if ($row) {
            $this->Mwarga->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/warga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/warga'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('no_rumah', 'no rumah', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('kata_sandi', 'kata sandi', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('jumlah_penghuni', 'jumlah penghuni', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Warga.php */
/* Location: ./application/controllers/Warga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-05 09:05:08 */
/* http://harviacode.com */