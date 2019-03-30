<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Review extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Review_model');
        $this->load->model('spot_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->cek_status('review/index');
        $this->render['content']= $this->load->view('review/review_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Review_model->json();
    }

    public function read($id) 
    {
        $this->cek_status('review/read');
        $row = $this->Review_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'review' => $row->review,
		'date' => $row->date,
		'rating' => $row->rating,
		'spotName' => $row->spotName,
		'userName' => $row->userName,
	    );
            $this->load->view('review/review_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('review'));
        }
    }

    public function create() 
    {
        $dataSelect = $this->user_model->get_by_id($this->session->userdata('logged_in')['id']);
        $dataSelect2 = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);
        $this->cek_status('review/create');
        $data = array(
            'button' => 'Create',
            'action' => site_url('review/create_action'),
	    'id' => set_value('id'),
	    'review' => set_value('review'),
	    'date' => set_value('date'),
	    'rating' => set_value('rating'),
	    'spotName' => set_value('spot_id'),
        'user_id' => set_value('user_id'),
        'user_data' => $dataSelect,
        'spot_data' => $dataSelect2,
	);
        $this->load->view('review/review_form', $data);
    }
    
    public function create_action() 
    {
        $ses = $this->session->userdata('logged_in');
        if(!empty($ses)){
            $data = array(
                'review' => $this->input->post('review',TRUE),
                'date' => date("Y-m-d H:i:s"),
                'rating' => $this->input->post('rating',TRUE),
                'spot_id' => $this->input->post('spot_id',TRUE),
                'user_id' => $ses['id'],
            );
    
            $this->Review_model->insert($data);
            redirect(site_url('Client/detail/'.$ses['id']));
        }else{
            $this->session->set_flashdata('message', 'Requires login access for this action');
            redirect(site_url('review'));
        }
        
    }
    
    public function update($id) 
    {
        $this->cek_status('review/update');
        $row = $this->Review_model->get_by_id($id);
        $dataSelect = $this->user_model->get_by_id($this->session->userdata('logged_in')['id']);
        $dataSelect2 = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('review/update_action'),
		'id' => set_value('id', $row->id),
		'review' => set_value('review', $row->review),
		'date' => set_value('date', $row->date),
		'rating' => set_value('rating', $row->rating),
		'spot_id' => set_value('spot_id', $row->spot_id),
        'user_id' => set_value('user_id', $row->user_id),
        'user_data' => $dataSelect,
        'spot_data' => $dataSelect2,
	    );
            $this->load->view('review/review_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('review'));
        }
    }
    
    public function update_action() 
    {
        $row = $this->Review_model->get_by_id($id);
        $dataSelect = $this->user_model->get_by_id($this->session->userdata('logged_in')['id']);
        $dataSelect2 = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'review' => $this->input->post('review',TRUE),
                'date' => $this->input->post('date',TRUE),
                'rating' => $this->input->post('rating',TRUE),
                'spot_id' => $this->input->post('spot_id',TRUE),
                'user_id' => $this->input->post('user_id',TRUE),
                'user_data' => $dataSelect,
                'spot_data' => $dataSelect2, 
	        );

            $this->Review_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('review'));
        }
    }
    
    public function delete($id) 
    {
        $this->cek_status('review/delete');

        $row = $this->Review_model->get_by_id($id);

        if ($row) {
            $this->Review_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('review'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('review'));
        }
    }
    public function cek_status($path){
        $data = $this->session->userdata('logged_in');
        $status = $data['level'];
        if (! $this->acl->is_public($path))
        {
            if (! $this->acl->is_allowed($path, $status))
            {
                redirect('auth/logout_action','refresh');
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('review', 'review', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('rating', 'rating', 'trim|required');
	$this->form_validation->set_rules('spot_id', 'spot id', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Review.php */
/* Location: ./application/controllers/Review.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-24 10:13:00 */
/* http://harviacode.com */