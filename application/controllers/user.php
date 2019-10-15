<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->encryption->initialize(
            array(
                    'cipher' => 'aes-256',
                    'mode' => 'ctr',
                    'key' => '<a 32-character random string>'
            )
    );
        $this->load->database();
    }

    function index()
    {
        $this->load->view('templates/header');
        $this->register();//called a function
        $this->load->view('templates/footer');
    }

    function register()
    {
        //set validation rules
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[cpassword]');

        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $data['fetch_data'] = $this->user_model->Get();
            $this->load->view('user_registration_view', $data);
        }
        else
        {
            $verification_key = md5(rand());
            //insert the user registration details into database
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'password' => $this->encryption->encrypt($this->input->post('password')),
                'verification_key' => $verification_key
            );


            // insert form data into database
            if ($this->user_model->insertUser($data))
            {

                $test_mail = "Please verify your email to login";
                $message = "HI this is email verification.click here to verify <a href='".base_url()."user/verify/".$verification_key."'>link</a>.<p>";
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtpout.gmail.com',
                    'smtp_port' => 80,
                    'smtp_user' => 'isuruvindula927@gmail.com',
                    'smtp_pass' => 'cde3CDE#',
                    'mailtype' => 'html',
                    'charset' => 'UTF-8',
                    'starttls' => true,
                    'wordwrap' => TRUE
                );
                //SEND EMAIL
                mail('smivindula@gmail.com',$test_mail, $message, 'From: isuruvindula927@gmail.com');

                // //send email
                // $this->load->library('email', $config);
                // $this->email->set_newline("\r\n");

                // $this->email->from("isuruvindula927@gmail.com", 'invoice');
                // // $this->email->to($this->input->post('email'));

                // $this->email->to('vindulaisuru@gmail.com');

                // // $this->email->subject($subject);
                // $this->email->subject('test mail');

                // $this->email->message('Testing the email class.');

                //Send mail
                if($this->email->send()){
                    $this->session->set_flashdata("message","Email sent successfully.Check your inbox");
                }else{
                    $this->session->set_flashdata("email_sent","Error in sending Email.");
                    //$this->load->view('email_form');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.Unable to input data  Please try again later!!!</div>');
                //redirect('user/register');
            }
        }
    }

    //verify the email address provided by user in registration form
    function verify()
    {
        if($this->uri->segment(3)){

            $verification_key = $this->uri->segment(3);

            if($this->user_model->verify_email($verification_key)){
                $data['message'] = '<h1 align="center">Your email has been successfully verified. Now you can login from <a href="'.base_url().'login">here</a></h1>';
            }else{

                $data['message'] = '<h1 align="center">Invalid Email</h1>';
            }
        }
        $this->load->view('Login',$data);
    }

    //delete the data in database
    public function delete($id){
        $this->user_model->delete_post($id);
        redirect('user');
    }

    //Edit the data in database
    public function getdata($id){
        $data['post'] = $this->user_model->get_post($id);
        $this->load->view('Update', $data);

        if(empty($data['post']))
        {
            show_404();
        }
    }

    public function update($id){

        $data = array(
            'id' => $id,
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $this->user_model->Update($data);
        $this->index();
    }

    public function profile_view(){
        $this->load->view('Profile_view');
    }

}
?>
