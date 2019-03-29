<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_model extends CI_Model
{

    public $table = 'news';
    public $id = 'news.id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('news.id,spot.name as spotName,news.tanggal,news.judul,news.keterangan');
        $this->datatables->from('news');
        //add this line for join
        $this->datatables->join('spot', 'news.id_spot = spot.id');
        $this->datatables->add_column('action', anchor(site_url('news/read/$1'),'Read')." | ".anchor(site_url('news/update/$1'),'Update')." | ".anchor(site_url('news/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
        $this->datatables->select('news.id,spot.name as spotName,news.tanggal,news.judul,news.keterangan, id_spot');
        $this->db->where($this->id, $id);
        $this->db->join('spot', 'news.id_spot = spot.id');
        return $this->db->get($this->table)->row();
    }

    function get_by_spot($id)
    {   
        $this->db->where('id_spot', $id);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('id_spot', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_spot', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('keterangan', $q);
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

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-27 18:37:19 */
/* http://harviacode.com */