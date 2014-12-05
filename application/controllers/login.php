<?php
class Login extends CI_Controller {
	function index() {
		$this->load->helper('openid');
		$openid = new LightOpenID('localhost');
$openid->identity = 'https://www.google.com/accounts/o8/id';
$openid->required = array(
  'contact/email',
  'namePerson/first',
  'namePerson/last'
);
$openid->returnUrl = '/obs/login/set';
echo '<a class="command" href="'.$openid->authUrl().'">Login</a>';

	}


	function logout() {
		$this->session->sess_destroy();
		redirect('http://www.google.com/accounts/Logout?continue=http://www.google.com/');
	}


	function set() {
		$this->load->helper('openid');
		$openid = new LightOpenID('localhost');

		if ($openid->mode) {
			if ($openid->mode == 'cancel') {
				// User has canceled authentication
			} elseif($openid->validate()) {

				if($this->input->get('openid_ext1_value_contact_email') == 'harishmunjuluri@gmail.com') {
					$this->load->library('session');
					$user_info= array(
					                   'username'  => $this->input->get('openid_ext1_value_namePerson_first').' '.$this->input->get('openid_ext1_value_namePerson_last'),
					                   'email'     => $this->input->get('openid_ext1_value_contact_email'),
					                   'logged_in' => TRUE
					);
					$this->session->set_userdata($user_info);
					redirect('/books/');
				} else {
					redirect('/display');
				}

			} else {
				// The user has not logged in via Google
			}
		} else {
			// The user does not come from the link of the first page

		}

	}


}
