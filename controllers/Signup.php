<?php
    class Signup extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model("signup_m");
        }

        function index(){
            $data["title"] = 'Registration';

            $this->load->view("common/header",$data);
            $this->load->view("signup_v");
            $this->load->view("common/footer");
        }

        function saveFile_c(){
            $data["success"] = false;

            $values = array(
                "fullname" => $this->input->post("txtnmFullname"),
                "username" => $this->input->post("txtnmUsername"),
                "password" => $this->input->post("txtnmPassword"),
                "division" => $this->input->post("txtnmDivision")
            );

            $request = $this->signup_m->saveFile_m($values);

            if($request){
                $data["success"] = true;
            }
            echo json_encode($data);
        }
    }
    
?>