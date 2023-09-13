<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mtransaksi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = @urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/index.html';
            $config['first_url'] = base_url() . 'transaksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mtransaksi->total_rows($q);
        $transaksi = $this->Mtransaksi->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('transaksi/20_transaksi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mtransaksi->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tgl_trx' => $row->tgl_trx,
		'id_warga' => $row->id_warga,
		'bukti_pembayaran' => $row->bukti_pembayaran,
		'total_bayar' => $row->total_bayar,
		'bukti_bayar' => $row->bukti_bayar,
	    );
            $this->load->view('transaksi/20_transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/transaksi/create_action'),
	    'id' => set_value('id'),
	    'tgl_trx' => set_value('tgl_trx'),
	    'id_warga' => set_value('id_warga'),
	    'bukti_pembayaran' => set_value('bukti_pembayaran'),
	    'total_bayar' => set_value('total_bayar'),
	    'bukti_bayar' => set_value('bukti_bayar'),
	);
        $this->load->view('transaksi/20_transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_trx' => $this->input->post('tgl_trx',TRUE),
		'id_warga' => $this->input->post('id_warga',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
		'bukti_bayar' => $this->input->post('bukti_bayar',TRUE),
	    );

            $this->Mtransaksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mtransaksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/transaksi/update_action'),
		'id' => set_value('id', $row->id),
		'tgl_trx' => set_value('tgl_trx', $row->tgl_trx),
		'id_warga' => set_value('id_warga', $row->id_warga),
		'bukti_pembayaran' => set_value('bukti_pembayaran', $row->bukti_pembayaran),
		'total_bayar' => set_value('total_bayar', $row->total_bayar),
		'bukti_bayar' => set_value('bukti_bayar', $row->bukti_bayar),
	    );
            $this->load->view('transaksi/20_transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tgl_trx' => $this->input->post('tgl_trx',TRUE),
		'id_warga' => $this->input->post('id_warga',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
		'bukti_bayar' => $this->input->post('bukti_bayar',TRUE),
	    );

            $this->Mtransaksi->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mtransaksi->get_by_id($id);

        if ($row) {
            $this->Mtransaksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_trx', 'tgl trx', 'trim|required');
	$this->form_validation->set_rules('id_warga', 'id warga', 'trim|required');
	$this->form_validation->set_rules('bukti_pembayaran', 'bukti pembayaran', 'trim|required');
	$this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required');
	$this->form_validation->set_rules('bukti_bayar', 'bukti bayar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-05 09:45:12 */
/* http://harviacode.com */