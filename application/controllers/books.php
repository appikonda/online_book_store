<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {
			redirect('/login');
		}
	}

	
	function delete($book_id) {
		$this->load->model('books_model');
		if($this->books_model->delete_book($book_id)) {
			redirect('/books/edit');
		}
		
	}
	
	function index($msg = '') {
		$data['msg'] = $msg;
		// Retrieve list of all the books from the database and display them
		$this->load->view('books_view', $data);
	}
	
	function add() {
		// Adds a book to the database
		// Load the addition form on a book addition view
		$this->load->view('add_book');
	}
	
	function edit() {
		// Edits and deletes books from the database
		$this->load->model('books_model');
		$data['books_list'] = $this->books_model->display_books();
		$this->load->view('books_edit_view', $data);
	}
	
	function verify_info() {
		// Verify the entered information
		
		if($this->input->post('add')) {
			// Made sure the function is not directly called without clicking the add button
			$this->load->model('books_model');
			
			if($this->books_model->add()) {
				// Success
				$msg = 'Book added successfully.';
				$this->index($msg);
			}
		} else {
			redirect('/add');
		}
	}
}
