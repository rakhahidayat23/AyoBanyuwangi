<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spot_model extends CI_Model
{

    public $table = 'spot';
    public $id = 'spot.id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('spot.id,spot.name,spot.description,spot.latitude,spot.longitude,spot.date,type_spot.name as type_spotName,user.name as userName,spot.start, spot.end, spot.status');
        $this->datatables->from('spot');
        //add this line for join
        $this->datatables->join('type_spot', 'spot.type_spot_id = type_spot.id');
        $this->datatables->join('user', 'spot.user_id = user.id');
        $this->datatables->add_column('action', anchor(site_url('spot/read/$1'),'Read')." | ".anchor(site_url('spot/update/$1'),'Update')." | ".anchor(site_url('spot/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->datatables->select('spot.id,spot.name,spot.description,spot.latitude,spot.longitude,spot.date,type_spot.name as type_spotName,user.name as userName, spot.start, spot.end, spot.status,type_spot_id');
        $this->db->where($this->id, $id);
        $this->datatables->join('type_spot', 'spot.type_spot_id = type_spot.id');
        $this->datatables->join('user', 'spot.user_id = user.id');
        return $this->db->get($this->table)->row();
    }
    // get data by id
    function get_by_idUser($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->result();
    }
    function get_by_type($id)
    {
        $this->db->where('type_spot_id', $id);
        return $this->db->get($this->table)->result();
    }
    function get_by_type_limit($id,$limit, $start){
        $this->db->where('type_spot_id', $id);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('latitude', $q);
	$this->db->or_like('longitude', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('type_spot_id', $q);
    $this->db->or_like('user_id', $q);
    $this->db->or_like('start', $q);
    $this->db->or_like('end', $q);
    $this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->or_like('name', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Spot_model.php */
/* Location: ./application/models/Spot_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-27 17:29:32 */
/* http://harviacode.com */