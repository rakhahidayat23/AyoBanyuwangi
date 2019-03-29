<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('spot_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->render['content']= $this->load->view('news/news_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->News_model->json();
    }

    public function read($id) 
    {
        $row = $this->News_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'spot_id' => $row->spot_id,
		'tanggal' => $row->tanggal,
		'judul' => $row->judul,
        'keterangan' => $row->keterangan,
        'spotName' => $row->spotName,
        );
        $this->render['content']= $this->load->view('news/news_read', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news'));
        }
    }

    public function create() 
    {
        $dataSelect = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);
        $data = array(
            'button' => 'Create',
            'action' => site_url('news/create_action'),
	    'id' => set_value('id'),
	    'spot_id' => set_value('spot_id'),
	    'tanggal' => set_value('tanggal'),
	    'judul' => set_value('judul'),
        'keterangan' => set_value('keterangan'),
        'spot_data' => $dataSelect,
	);
        $this->render['content']= $this->load->view('news/news_form', $data, TRUE);
        $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'spot_id' => $this->input->post('spot_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->News_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('news'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->News_model->get_by_id($id);
        $dataSelect = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('news/update_action'),
		'id' => set_value('id', $row->id),
		'spot_id' => set_value('spot_id', $row->spot_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'judul' => set_value('judul', $row->judul),
        'keterangan' => set_value('keterangan', $row->keterangan),
        'spot_data' => $dataSelect,
	    );
            $this->render['content']= $this->load->view('news/news_form', $data, TRUE);
            $this->load->view('template', $this->render);    
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'spot_id' => $this->input->post('spot_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->News_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('news'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->News_model->get_by_id($id);

        if ($row) {
            $this->News_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('news'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('spot_id', 'id spot', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-27 18:37:19 */
/* http://harviacode.com */