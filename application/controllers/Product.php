<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('spot_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->render['content']= $this->load->view('product/product_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Product_model->json();
    }

    public function read($id) 
    {
        $row = $this->Product_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'name' => $row->name,
                'image' => $row->image,
                'description' => $row->description,
                'price' => $row->price,
                'date' => $row->date,
                'spotName' => $row->spotName,
	        );
            
            $this->render['content']= $this->load->view('product/product_read', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function create() 
    {
        $dataSelect = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);
        $data = array(
            'button' => 'Create',
            'action' => site_url('product/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'image' => set_value('image'),
            'description' => set_value('description'),
            'price' => set_value('price'),
            'date' => set_value('date'),
            'spot_id' => set_value('spot_id'),
            'spot_data' => $dataSelect,
        );
        $this->render['content']= $this->load->view('product/product_form', $data, TRUE);
        $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
    
            $config['upload_path']          = './assets/upload/product/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }else{
                $file = 'assets/upload/product/'.$this->upload->data('file_name');
                $data = array(
                    'name' => $this->input->post('name',TRUE),
                    'image' => $file,
                    'description' => $this->input->post('description',TRUE),
                    'price' => $this->input->post('price',TRUE),
                    'spot_id' => $this->input->post('spot_id',TRUE),
                    'date' => date("Y-m-d H:i:s"),
                );
    

            $this->Product_model->insert($data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('product'));
            }

           
           
        }
    }
    
    public function update($id) 
    {
        $row = $this->Product_model->get_by_id($id);
        $dataSelect = $this->spot_model->get_by_idUser($this->session->userdata('logged_in')['id']);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('product/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
                'image' => set_value('image', $row->image),
                'description' => set_value('description', $row->description),
                'price' => set_value('price', $row->price),
                'date' => set_value('date', $row->date),
                'spot_id' => set_value('spot_id', $row->spot_id),
                'spot_data' => $dataSelect,
            );
            $this->render['content']= $this->load->view('product/product_form', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        $config['upload_path']          = './assets/upload/product/';
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
                    'description' => $this->input->post('description',TRUE),
                    'price' => $this->input->post('price',TRUE),
                    'spot_id' => $this->input->post('spot_id',TRUE),
                );
            }else{
                @unlink($foto_lama);
                $file = 'assets/upload/product/'.$this->upload->data('file_name');
                $data = array(
                    'name' => $this->input->post('name',TRUE),
                    'image' => $file,
                    'description' => $this->input->post('description',TRUE),
                    'price' => $this->input->post('price',TRUE),
                    'spot_id' => $this->input->post('spot_id',TRUE),
                );
                var_dump($data);
            }

            $this->Product_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('product'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            @unlink($row->image);
            $this->Product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('product'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required');
	$this->form_validation->set_rules('spot_id', 'spot id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-22 05:40:36 */
/* http://harviacode.com */