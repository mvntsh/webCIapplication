<?php
    /**
     * 
     */
    class Login extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            //place your model here.
        }    

        function index(){
            $data["title"] = 'User Login';
            $this->load->view("common/header",$data);
            $this->load->view("login_v");
            $this->load->view("common/footer");
        }
    }
    
?>