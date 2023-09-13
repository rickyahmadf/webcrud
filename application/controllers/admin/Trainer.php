<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trainer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MTrainer');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = @urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'trainer/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'trainer/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'trainer/index.html';
            $config['first_url'] = base_url() . 'trainer/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MTrainer->total_rows($q);
        $trainer = $this->MTrainer->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'trainer_data' => $trainer,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('trainer/trainer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MTrainer->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'telepon' => $row->telepon,
		'status' => $row->status,
	    );
            $this->load->view('trainer/trainer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/trainer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/trainer/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'telepon' => set_value('telepon'),
	    'status' => set_value('status'),
	);
        $this->load->view('trainer/trainer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MTrainer->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/trainer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MTrainer->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/trainer/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'telepon' => set_value('telepon', $row->telepon),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('trainer/trainer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/trainer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MTrainer->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/trainer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MTrainer->get_by_id($id);

        if ($row) {
            $this->MTrainer->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/trainer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/trainer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Trainer.php */
/* Location: ./application/controllers/Trainer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-14 04:18:10 */
/* http://harviacode.com */