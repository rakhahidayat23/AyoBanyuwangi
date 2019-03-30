<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $data = $this->session->userdata('logged_in');
        // $status = $data['level'];

        // if (! $this->acl->is_public('event'))
        // {
        //     if (! $this->acl->is_allowed('event', $status))
        //     {
        //         redirect('auth/logout_action','refresh');
        //     }
        // }

        $this->load->model('Event_model');
        $this->load->model('spot_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
      $this->render['content']= $this->load->view('event/event_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Event_model->json();
    }

    public function read($id) 
    {
        $row = $this->Event_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'date' => $row->date,
		'location' => $row->location,
		'description' => $row->description,
		'image' => $row->image,
		'userName' => $row->userName,
        'spotName' => $row->spotName,
        'price' => $row->price,
	    );
        $this->render['content']= $this->load->view('event/event_read', $data, TRUE);
        $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('event'));
        }
    }

    public function create() 
    {
        $dataSelect = $this->user_model->get_by_id($this->session->userdata('logged_in')['id']);
        $dataSelect2 = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);
      
        $data = array(
            'button' => 'Create',
            'action' => site_url('event/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'date' => set_value('date'),
	    'location' => set_value('location'),
	    'description' => set_value('description'),
	    'image' => set_value('image'),
	    'user_id' => set_value('user_id'),
        'spot_id' => set_value('spot_id'),
        'price' => set_value('price'),
        'user_data' => $dataSelect,
        'spot_data' => $dataSelect2,
	);
    $this->render['content']= $this->load->view('event/event_form', $data, TRUE);
    $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
            $config['upload_path']          = './assets/upload/event/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }else{
                $file = 'assets/upload/event/'.$this->upload->data('file_name');
                $data = array(
		'name' => $this->input->post('name',TRUE),
		'date' => $this->input->post('date',TRUE),
		'location' => $this->input->post('location',TRUE),
		'description' => $this->input->post('description',TRUE),
		'image' => $this->input->post('image',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
        'spot_id' => $this->input->post('spot_id',TRUE),
        'price' => $this->input->post('price',TRUE),
	    );

            $this->Event_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('event'));
        }
    }
}
    public function update($id) 
    {
        $row = $this->Event_model->get_by_id($id);
        $dataSelect = $this->user_model->get_by_id($this->session->userdata('logged_in')['id']);
        $dataSelect2 = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('event/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'date' => set_value('date', $row->date),
		'location' => set_value('location', $row->location),
		'description' => set_value('description', $row->description),
		'image' => set_value('image', $row->image),
		'user_id' => set_value('user_id', $row->user_id),
        'spot_id' => set_value('spot_id', $row->spot_id),
        'price' => set_value('price', $row->price),
        'user_data' => $dataSelect,
        'spot_data' => $dataSelect2, 
    );
    $this->render['content']= $this->load->view('event/event_form', $data, TRUE);
    $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('event'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        
        $config['upload_path']          = './assets/upload/event/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000000000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $foto_lama = $this->input->post('foto_lama',TRUE);
            if ( !$this->upload->do_upload('image')){
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'date' => $this->input->post('date',TRUE),
		'location' => $this->input->post('location',TRUE),
		'description' => $this->input->post('description',TRUE),
		'image' => $this->input->post('image',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
        'spot_id' => $this->input->post('spot_id',TRUE),
        'price' => $this->input->post('price',TRUE),
	    );
    }else{
        @unlink($foto_lama);
        $file = 'assets/upload/event/'.$this->upload->data('file_name');
        $data = array(
            'name' => $this->input->post('name',TRUE),
            'date' => $this->input->post('date',TRUE),
            'location' => $this->input->post('location',TRUE),
            'description' => $this->input->post('description',TRUE),
            'image' => $this->input->post('image',TRUE),
            'user_id' => $this->input->post('user_id',TRUE),
            'spot_id' => $this->input->post('spot_id',TRUE),
            'price' => $this->input->post('price',TRUE),
            );
            var_dump($data);
        }
            $this->Event_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('event'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Event_model->get_by_id($id);

        if ($row) {
            $this->Event_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('event'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('event'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('location', 'location', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
    $this->form_validation->set_rules('spot_id', 'spot id', 'trim|required');
    $this->form_validation->set_rules('price', 'price', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Event.php */
/* Location: ./application/controllers/Event.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-29 14:45:53 */
/* http://harviacode.com */