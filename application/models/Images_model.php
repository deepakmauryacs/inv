<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images_model extends CI_model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_images($limit, $offset, $search, $count)
	{
		$this->db->select('*');
		$this->db->from('tbl_images');
		$this->db->order_by("id", "asc");
		
		if($count){
			return $this->db->count_all_results();
		}
		else {
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		return array();
	}
}
?>