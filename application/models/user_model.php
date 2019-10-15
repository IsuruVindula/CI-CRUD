<?php
defined('BASEPATH') or exit('No direct script access allowed');
//I'm the user model

class user_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //insert into user table
    function insertUser($data)//insert user
    {
        return $this->db->insert('user', $data);
    }

    //activate user account(verification)
    function verify_email($key)// verify the email
    {
        $this->db->where('verification_key',$key);
        $this->db->where('is_email_verified','NO');
        $query = $this->db->get('user');

        if($query->num_rows() > 0){
            $data = array('is_email_verified' => 'YES');
            $this->db->where('verification_key',$key);
            $this->db->update('user',$data);
            return true;
        }else{
            return false;
        }
    }

    //get data
    public function Get(){//get details from database
        $que = $this->db->get('user');
        return $que;
    }

    //delete data
    public function delete_post($id){//delete details in database
        $this->db->where('id', $id);
        $this->db->delete('user');
        return true;
    }

    public function update_post(){//update details
        $id = url_title($this->input->post('id'));

        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('body')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

    public function get_post($id)//get post according to a condition
    {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }

    public function Update($data){//update details with an condition
        $this->db->where('id',$data['id']);
        $this->db->update('user',$data);
    }

}
?>
