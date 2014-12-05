<?php
class Books_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function add() {

		$config = array(
								'upload_path' => realpath(APPPATH.'../pictures'),
								'allowed_types' => 'jpg|jpeg|png|bmp',
								'overwrite' => FALSE,
								'max_size' => 6144,
								'remove_spaces' => TRUE
		);
		$this->load->library('upload', $config);
		$field_name = 'display-pic';

		if($this->upload->do_upload($field_name)) {
			// Successfully uploaded file to server
			$file_info = $this->upload->data();

			$values = array(
			$this->input->post('author'),
			$this->input->post('title'),
			$this->input->post('price'),
			'/obs/pictures/'.$file_info['file_name'],
			$this->input->post('category'),
			$this->input->post('isbn'),
			$this->input->post('qty')
			);
			// Insert resume information into database
			$query = "INSERT INTO books(author, title, price, display_pic, category, isbn, qty)
										  VALUES(?,?,?,?,?,?,?)";
			return $this->db->query($query, $values);

			} else {
				// Failed
				$this->upload->display_errors('<p class="error">', '</p>');
			}
	}

	function display_books() {
		$query = "SELECT * FROM books";
		$result_set = $this->db->query($query);
		if($result_set->num_rows() > 0) {
			foreach($result_set->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}


	}

	function display_book_info($id) {
		$query = "SELECT * FROM books WHERE book_id=?";
		$result_set = $this->db->query($query, $id);
		if($result_set->num_rows() > 0) {
			foreach($result_set->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}


	}

	function purchase($id) {
		$query = "SELECT * FROM books WHERE book_id=?";
		$result_set = $this->db->query($query, $id);
		if($result_set->num_rows() > 0) {
			foreach($result_set->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}


	}

	function delete_book($book_id) {
		$query = "DELETE FROM books WHERE book_id=?";
		return $this->db->query($query, $book_id);
	}
}