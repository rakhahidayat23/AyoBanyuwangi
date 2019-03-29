<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $data = $this->session->userdata('logged_in');
        $status = $data['level'];
        if (! $this->acl->is_public('client'))
        {
            if (! $this->acl->is_allowed('client', $status))
            {
                redirect('auth/logout_action','refresh');
            }
        }

        $this->load->model('Type_spot_model');
        $this->load->model('Spot_model');
        $this->load->model('Review_model');
        $this->load->model('Gallery_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->library('pagination');
    }

    public function index()
    {
        $returnArray = array();
        $spotList = array();
        
        $type_spot = $this->Type_spot_model->get_all();
        $spot = $this->Spot_model->get_all();

        $auth_Bri = $this->req->auth();

        $BarearToken = 'Bearer '.$auth_Bri->access_token;

        $location_atm = $this->req->get_atm($BarearToken,'-8.208698000000016','114.37390900000003');

        foreach ($location_atm->data as $key) {
            $tmpArray = array(
                'id' => $key->tid,
                'name' => "ATM BRI", 
                'alamat' => $key->alamat, 
                'lokasi' => $key->lokasi,
                'latitude' => $key->latitude, 
                'longitude' => $key->longitude, 
                'type' => "ATM", 
            );
            array_push($spotList,$tmpArray);
        }

        // var_dump($location_atm->data);

        

        foreach ($spot as $keySpot) {
            $offset=6*60*60;
            $date1 = DateTime::createFromFormat('H:i a', date("H:i a",time() + $offset));
            $date2 = DateTime::createFromFormat('H:i a', $keySpot->start);
            $date3 = DateTime::createFromFormat('H:i a', $keySpot->end);
            if ($date1 > $date2 && $date1 < $date3){
                $data = array(
                    'status' => 1,
                );
            
            }else{
                $data = array(
                    'status' => 0,
                );
            }
            $this->Spot_model->update($keySpot->id, $data);

            $tmpType = $this->Type_spot_model->get_by_id($keySpot->type_spot_id);
            $tmpImage = $this->Gallery_model->get_by_spot($keySpot->id);
            $tmpArray = array(
                'id' => $keySpot->id,
                'name' => $keySpot->name, 
                'image' => $tmpImage[0]->image, 
                'description' => $keySpot->description, 
                'latitude' => $keySpot->latitude, 
                'longitude' => $keySpot->longitude, 
                'type' => $tmpType->name, 
            );
            
            array_push($spotList,$tmpArray);
        }

        foreach ($type_spot as $keyType) {
            $tmp = $this->getTopSpotByReview($keyType->id);
            if($keySpot->status == 1){  
                $status = "Open"; 
            }else{ 
                $status = "close";
            }
           
            $tmpArray = array(
                'id' => $keyType->id,
                'name' => $keyType->name,
                'title' => $keyType->title,
                'description' => $keyType->description,
                'image' => $keyType->image,
                'listSpot' => $tmp,
                'status' => $status,
            );
            array_push($returnArray,$tmpArray);
        }

        $data = array(
            'type_spot' => $returnArray,
            'listMaps' => json_encode($spotList),
        );
        
        $this->render['content']= $this->load->view('client_page/home', $data, TRUE);
        $this->load->view('templateClient', $this->render);
    }
    public function detail($id){
        $ses = $this->session->userdata('logged_in');
        $tmpSpot = $this->Spot_model->get_by_id($id);
        $review = $this->Review_model->get_by_spot($tmpSpot->id);
        if(!empty($ses)){
            $dataReview = count($this->Review_model->get_by_user($tmpSpot->id,$ses['id']));
            if($dataReview > 0){
                $review_user = $this->Review_model->get_by_user($tmpSpot->id,$ses['id'])[$dataReview -1 ]->rating;
            }else{
                $review_user = 0;    
            }
        }else{
            $review_user = 0;
        }
        $tmp = 0;

        foreach ($review as $key) {
            $tmp += $key->rating;
        }
        if(count($review) > 0){
            $tmp = $tmp/count($review);
        }else{
            $tmp = 0;
        }

        $data = array(
            'spot' => $tmpSpot,
            'image' => $this->Gallery_model->get_by_spot($tmpSpot->id),
            'type' => $this->Type_spot_model->get_by_id($tmpSpot->type_spot_id),
            'rating' => $tmp,
            'review' => $review_user,
            'review_all' =>$this->Review_model->get_by_spot($tmpSpot->id),
            'product' => $this->Product_model->get_by_spot($tmpSpot->id),
            'root_url' => base_url(),
            'action' => site_url('review/create_action')
        );
        $this->render['content']= $this->load->view('client_page/detail_location', $data, TRUE);
        $this->load->view('templateClient', $this->render);
    }
    private function getTopSpotByReview($id){
        $dataReturn = array();
        $dateSpot = $this->Spot_model->get_by_type($id);
        foreach ($dateSpot as $keySpot) {
            $totalReting = 0;
            $dataReview = $this->Review_model->get_by_spot($keySpot->id);
            $tmpImage = $this->Gallery_model->get_by_spot($keySpot->id);
            foreach ($dataReview as $keyReview) {
                $totalReting += $keyReview->rating;
            }
            
            if(count($dataReview) > 0){
                $totalReting = $totalReting / count($dataReview);
            }

            $tmp = array(
                'id' => $keySpot->id, 
                'name' => $keySpot->name, 
                'image' => $tmpImage[0]->image, 
                'description' => $keySpot->description, 
                'latitude' => $keySpot->latitude, 
                'longitude' => $keySpot->longitude,
                'reting' =>  $totalReting,
            );
            array_push($dataReturn,$tmp);
        }
        
        usort($dataReturn, function($a, $b) {return $b['reting'] <=> $a['reting'];});

        return array_slice($dataReturn,0,4);
    }

    public function more($param){
        $dataReturn = array();
         //konfigurasi pagination
         $config['base_url'] = site_url('client/more/'.$param); //site url
         $config['total_rows'] = count($this->Spot_model->get_by_type($param)); //total row
         $config['per_page'] = 5;  //show record per halaman
         $config["uri_segment"] = 4;  // uri parameter
         $choice = $config["total_rows"] / $config["per_page"];
         $config["num_links"] = floor($choice);
  
         // Membuat Style pagination untuk BootStrap v4
       $config['first_link']       = 'First';
         $config['last_link']        = 'Last';
         $config['next_link']        = 'Next';
         $config['prev_link']        = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';
  
         $this->pagination->initialize($config);
         $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
  
         $tmpData = $this->Spot_model->get_by_type_limit($param,$config["per_page"], $data['page']);
         foreach ($tmpData as $keySpot) {
            $totalReting = 0;
            $dataReview = $this->Review_model->get_by_spot($keySpot->id);
            $tmpImage = $this->Gallery_model->get_by_spot($keySpot->id);
            foreach ($dataReview as $keyReview) {
                $totalReting += $keyReview->rating;
            }
            
            if(count($dataReview) > 0){
                $totalReting = $totalReting / count($dataReview);
            }

            if($keySpot->status == 1){  
                $status = "Open"; 
            }else{ 
                $status = "close";
            }

            $tmp = array(
                'id' => $keySpot->id, 
                'name' => $keySpot->name, 
                'image' => $tmpImage[0]->image, 
                'description' => $keySpot->description, 
                'latitude' => $keySpot->latitude, 
                'longitude' => $keySpot->longitude,
                'reting' =>  $totalReting,
                'status' => $status,
            );
            array_push($dataReturn,$tmp);
        }
        
        usort($dataReturn, function($a, $b) {return $b['reting'] <=> $a['reting'];});

         $data['data'] =  $dataReturn;           
  
         $data['pagination'] = $this->pagination->create_links();
  
         //load view mahasiswa view
        $this->render['content']= $this->load->view('client_page/more',$data, TRUE);
        $this->load->view('templateClient', $this->render);
    }
    
    public function search(){
        $param= $this->input->get('destination');
        $dataReturn = array();
       
       usort($dataReturn, function($a, $b) {return $b['reting'] <=> $a['reting'];});
        //konfigurasi pagination
        $config['base_url'] = site_url('client/more/'.$param); //site url
        $config['total_rows'] = count($this->Spot_model->get_by_type($param)); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $tmpData = $this->Spot_model->get_limit_data($config["per_page"], $data['page'],$param);
        foreach ($tmpData as $keySpot) {
           $totalReting = 0;
           $dataReview = $this->Review_model->get_by_spot($keySpot->id);
           $tmpImage = $this->Gallery_model->get_by_spot($keySpot->id);
           foreach ($dataReview as $keyReview) {
               $totalReting += $keyReview->rating;
           }
           
           if(count($dataReview) > 0){
               $totalReting = $totalReting / count($dataReview);
           }

           $tmp = array(
               'id' => $keySpot->id, 
               'name' => $keySpot->name, 
               'image' => $tmpImage[0]->image, 
               'description' => $keySpot->description, 
               'latitude' => $keySpot->latitude, 
               'longitude' => $keySpot->longitude,
               'reting' =>  $totalReting,
               'type' => $keySpot->type_spot_id,
               'status' => $keySpot->status,
           );
           array_push($dataReturn,$tmp);
       }
        $data['data'] =  $dataReturn; 
        $param = $dataReturn[0]['type'];       
 
        $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
       $this->render['content']= $this->load->view('client_page/more',$data, TRUE);
       $this->load->view('templateClient', $this->render);
    }

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-22 05:40:35 */
/* http://harviacode.com */