<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mmahasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = @urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mahasiswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mahasiswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mahasiswa/index.html';
            $config['first_url'] = base_url() . 'mahasiswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mmahasiswa->total_rows($q);
        $mahasiswa = $this->Mmahasiswa->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mahasiswa_data' => $mahasiswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mahasiswa/mahasiswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mmahasiswa->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'npm' => $row->npm,
		'nama' => $row->nama,
		'prodi' => $row->prodi,
		'alamat' => $row->alamat,
	    );
            $this->load->view('mahasiswa/mahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/mahasiswa/create_action'),
	    'id' => set_value('id'),
	    'npm' => set_value('npm'),
	    'nama' => set_value('nama'),
	    'prodi' => set_value('prodi'),
	    'alamat' => set_value('alamat'),
	);
        $this->load->view('mahasiswa/mahasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'prodi' => $this->input->post('prodi',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Mmahasiswa->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/mahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mmahasiswa->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/mahasiswa/update_action'),
		'id' => set_value('id', $row->id),
		'npm' => set_value('npm', $row->npm),
		'nama' => set_value('nama', $row->nama),
		'prodi' => set_value('prodi', $row->prodi),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->load->view('mahasiswa/mahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'prodi' => $this->input->post('prodi',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Mmahasiswa->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/mahasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mmahasiswa->get_by_id($id);

        if ($row) {
            $this->Mmahasiswa->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/mahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npm', 'npm', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-29 16:48:32 */
/* http://harviacode.com */