<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Review_model extends CI_Model
{

    public $table = 'review';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,review,date,rating,spot.name as spot_id, user.name as user_id');
        $this->datatables->from('review');
        //add this line for join
        //$this->datatables->join('table2', 'review.field = table2.field');
        $this->datatables->join('spot', 'review.spot_id = spot.id');
        $this->datatables->join('user', 'review.user_id = user.id');
        $this->datatables->add_column('action', anchor(site_url('review/read/$1'),'Read')." | ".anchor(site_url('review/update/$1'),'Update')." | ".anchor(site_url('review/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
        $this->datatables->select('review.id,review,review.date,rating,spot.name as spot_id,user.name as user_id,spot_id');
        $this->db->where($this->id, $id);
        $this->db->join('spot', 'review.spot_id = spot.id');
        $this->db->join('user', 'review.user_id = user.id');
        return $this->db->get($this->table)->row();
    }

    function get_by_spot($id)
    {
        $this->datatables->select('review.id,review,review.date,rating,spot.name,user.image');
        $this->db->join('spot', 'review.spot_id = spot.id');
        $this->db->join('user', 'review.user_id = user.id');
        $this->db->where('spot_id',$id);
        return $this->db->get($this->table)->result();
    }
    function get_by_user($id,$user)
    {
        $this->datatables->select('review.id,review,review.date,rating,user.name as user_id,user.image');
        $this->db->join('user', 'review.user_id = user.id');
        $this->db->where('user_id',$user);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('review', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('rating', $q);
	$this->db->or_like('spot_id', $q);
	$this->db->or_like('user_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('review', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('rating', $q);
	$this->db->or_like('spot_id', $q);
	$this->db->or_like('user_id', $q);
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

/* End of file Review_model.php */
/* Location: ./application/models/Review_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-24 10:13:00 */
/* http://harviacode.com */