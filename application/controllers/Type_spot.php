<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Type_spot extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Type_spot_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->render['content']= $this->load->view('type_spot/type_spot_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Type_spot_model->json();
    }

    public function read($id) 
    {
        $row = $this->Type_spot_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'title' => $row->title,
		'description' => $row->description,
		'image' => $row->image,
	    );
            $this->load->view('type_spot/type_spot_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('type_spot'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('type_spot/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'title' => set_value('title'),
	    'description' => set_value('description'),
	    'image' => set_value('image'),
	);
        $this->load->view('type_spot/type_spot_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $config['upload_path']          = './assets/upload/type_spot/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }else{
                $file = 'assets/upload/type_spot/'.$this->upload->data('file_name');
                $data = array(
                    'name' => $this->input->post('name',TRUE),
                    'title' => $this->input->post('title',TRUE),
                    'description' => $this->input->post('description',TRUE),
                    'image' => $file,
                );

            $this->Type_spot_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('type_spot'));
        }
    }
}
    
    public function update($id)
    {
        $row = $this->Type_spot_model->get_by_id($id);
        $dataSelect = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('type_spot/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'title' => set_value('title', $row->title),
		'description' => set_value('description', $row->description),
		'image' => set_value('image', $row->image),
	    );
        $this->render['content']= $this->load->view('type_spot/type_spot_form', $data, TRUE);
        $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('type_spot'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        $config['upload_path']          = './assets/upload/type_spot/';
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
                    'title' => $this->input->post('title',TRUE),
                    'description' => $this->input->post('description',TRUE),
                    'image' => $this->input->post('image',TRUE),
                );
            }else{
                @unlink($foto_lama);
                $file = 'assets/upload/type_spot/'.$this->upload->data('file_name');
                $data = array(
                    'name' => $this->input->post('name',TRUE),
                    'title' => $this->input->post('title',TRUE),
                    'description' => $this->input->post('description',TRUE),
                    'image' => $file,
                );
                var_dump($data);
            }

            $this->Product_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('type_spot'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Type_spot_model->get_by_id($id);

        if ($row) {
            $this->Type_spot_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('type_spot'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('type_spot'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Type_spot.php */
/* Location: ./application/controllers/Type_spot.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-23 16:22:58 */
/* http://harviacode.com */