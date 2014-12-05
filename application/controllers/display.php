<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
	}
	
	function index() {
		$this->load->model('books_model');
		$data['books_list'] = $this->books_model->display_books();
		if($this->session->userdata('logged_in') && $this->session->userdata('email') == 'harishmunjuluri@gmail.com') {
			$data['is_admin'] = TRUE;
		}
		$this->load->view('display_view', $data);
	}
	
	
	function preview($id) {
		$this->load->model('books_model');
		$this->load->model('comments_model');
		$data['books_list'] = $this->books_model->display_book_info($id);
		$data['comment_list'] = $this->comments_model->get_comments($id);
		if($this->session->userdata('logged_in') && $this->session->userdata('email') == 'harishmunjuluri@gmail.com') {
			$data['is_admin'] = TRUE;
		}
		$this->load->view('preview_view', $data);
	}
	
	function comment($book_id) {
		if($this->input->post('comment')) {
			// comment button is clicked
			$this->load->model('comments_model');
			
			$link = base_url().'display/preview/'.$book_id;
			if($this->comments_model->insert_comment($book_id)) {
				redirect($link);
			} else {
				redirect($link);
			}
			
		}
	}
	
	function purchase($id) {
		$this->load->model('books_model');
		$data['books_list'] = $this->books_model->purchase($id);
		$this->load->view('purchase_view', $data);
	}
}