<?php

Class user_login extends CI_Controller {

public function __construct() {
parent::__construct();
}

// Show login page
public function index() {
    $this->load->view('templates/header');
    $this->load->view('Login');
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
    if(isset($this->session->userdata['logged_in'])){
    $this->load->view('Profile');
    }else{
    $this->load->view('templates/header');
    $this->load->view('Login');
    }
} else {

$data = array(
'username' => $this->input->post('email'),
'password' => $this->encryption->encrypt($this->input->post('password'))
);
$result = $this->Login_model->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->login_database->read_user_information($username);

    if ($result != false) {
    $session_data = array(
    'username' => $result[0]->user_name,
    'email' => $result[0]->user_email,
    );

    // Add user data in session
    $this->session->set_userdata('logged_in', $session_data);
    $this->load->view('Profile');
    }
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('Login', $data);
}
}
}

// Logout from profile page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('Login', $data);
}

}

?>