<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spot extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $data = $this->session->userdata('logged_in');
        $status = $data['level'];

        if (! $this->acl->is_public('spot'))
        {
            if (! $this->acl->is_allowed('spot', $status))
            {
                redirect('auth/logout_action','refresh');
            }
        }
        $this->load->model('Spot_model');
        $this->load->model('type_spot_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->render['content']= $this->load->view('spot/spot_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Spot_model->json();
    }

    public function read($id) 
    {
        $row = $this->Spot_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'name' => $row->name,
                'description' => $row->description,
                'latitude' => $row->latitude,
                'longitude' => $row->longitude,
                'date' => $row->date,
                'type_spotName' => $row->type_spotName,
                'userName' => $row->userName,
                'start' => $row->start,
                'end' => $row->end,
                'status' => $row->status,
            );
        $this->render['content']= $this->load->view('spot/spot_read', $data, TRUE);
            $this->load->view('template', $this->render);
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spot'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('spot/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'description' => set_value('description'),
            'latitude' => set_value('latitude'),
            'longitude' => set_value('longitude'),
            'date' => set_value('date'),
            'type_spot_id' => set_value('type_spot_id'),
            'user_id' => set_value('user_id',$this->session->userdata('logged_in')['id']),
            'start' => set_value('start'),
            'end' => set_value('end'),
            'status' => set_value('status'),  
            'spot' => $this->Spot_model->get_by_idUser($this->session->userdata('logged_in')['id']),
	    );
        $this->render['content']= $this->load->view('spot/spot_form', $data, TRUE);
        $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'name' => $this->input->post('name',TRUE),
                'description' => $this->input->post('description',TRUE),
                'latitude' => $this->input->post('latitude',TRUE),
                'longitude' => $this->input->post('longitude',TRUE),
                'date' => date("Y-m-d H:i:s"),
                'type_spot_id' => $this->input->post('type_spot_id',TRUE),
                'user_id' => $this->input->post('user_id',TRUE),
                'start' => $this->input->post('start',TRUE),
                'end' => $this->input->post('end',TRUE),
            );

            $this->Spot_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('spot'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Spot_model->get_by_id($id);


        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('spot/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
                'description' => set_value('description', $row->description),
                'latitude' => set_value('latitude', $row->latitude),
                'longitude' => set_value('longitude', $row->longitude),
                'date' => set_value('date', $row->date),
                'type_spot_id' => set_value('type_spot_id', $row->type_spot_id),
                'user_id' => set_value('user_id', $this->session->userdata('logged_in')['id']),
                'start' => set_value('start', $row->start),
                'end' => set_value('end', $row->end),
                'status' => set_value('status', $row->status),
                'spot' => $this->Spot_model->get_by_idUser($this->session->userdata('logged_in')['id']),
                
            );
            $this->render['content']= $this->load->view('spot/spot_form', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spot'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
		'date' => $this->input->post('date',TRUE),
		'type_spot_id' => $this->input->post('type_spot_id',TRUE),
        'user_id' => $this->input->post('user_id',TRUE),
        'start' => $this->input->post('start',TRUE),
        'end' => $this->input->post('end',TRUE),
        'status' => $this->input->post('status',TRUE),
	    );

            $this->Spot_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spot'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Spot_model->get_by_id($id);

        if ($row) {
            $this->Spot_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('spot'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spot'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('type_spot_id', 'type spot id', 'trim|required');
    $this->form_validation->set_rules('user_id', 'user id', 'trim|required');
    $this->form_validation->set_rules('start', 'start', 'trim|required');
    $this->form_validation->set_rules('end', 'end', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Spot.php */
/* Location: ./application/controllers/Spot.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-27 17:29:32 */
/* http://harviacode.com */