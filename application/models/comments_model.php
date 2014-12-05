<?php
class Comments_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get_comments($book_id) {
		$query = "SELECT * FROM comments WHERE book_id=? ORDER BY thetime desc";
		$result_set = $this->db->query($query, $book_id);
		if($result_set->num_rows() > 0) {
			foreach($result_set->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function insert_comment($book_id) {
		$values = array($book_id, $this->input->post('commenter'), $this->input->post('content'), $this->input->post('rating'));
		$query = "INSERT INTO comments(book_id, commenter, content, rating)
				  values(?, ?, ?, ?)";
		return $this->db->query($query, $values);
	}
	
}