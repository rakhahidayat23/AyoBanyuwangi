<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('acl');
        
        $data = $this->session->userdata('logged_in');
        $status = $data['level'];
        if (! $this->acl->is_public('gallery'))
        {
            if (! $this->acl->is_allowed('gallery', $status))
            {
                redirect('auth/logout_action','refresh');
            }
        }
        $this->load->model('Gallery_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('gallery/gallery_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Gallery_model->json();
    }

    public function read($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'image' => $row->image,
		'spot_id' => $row->spot_id,
	    );
            $this->load->view('gallery/gallery_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gallery/create_action'),
	    'id' => set_value('id'),
	    'image' => set_value('image'),
	    'spot_id' => set_value('spot_id'),
	);
        $this->load->view('gallery/gallery_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'image' => $this->input->post('image',TRUE),
		'spot_id' => $this->input->post('spot_id',TRUE),
	    );

            $this->Gallery_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('gallery'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gallery/update_action'),
		'id' => set_value('id', $row->id),
		'image' => set_value('image', $row->image),
		'spot_id' => set_value('spot_id', $row->spot_id),
	    );
            $this->load->view('gallery/gallery_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'image' => $this->input->post('image',TRUE),
		'spot_id' => $this->input->post('spot_id',TRUE),
	    );

            $this->Gallery_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gallery'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $this->Gallery_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gallery'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('image', 'image', 'trim|required');
	$this->form_validation->set_rules('spot_id', 'spot id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-22 05:40:35 */
/* http://harviacode.com */