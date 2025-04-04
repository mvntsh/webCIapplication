<?php
    /**
     * 
     */
    class Login extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model("login_m");
            $this->load->library('session');
        }    

        function index(){
            $data["title"] = 'User Login';
            $this->load->view("common/header",$data);
            $this->load->view("login_v");
            $this->load->view("common/footer");
        }

        function userVerification_c(){
            $data["success"] = false;

			$username = $this->input->post("txtnmUsername");
            $password = $this->input->post("txtnmPassword");

			$response = $this->login_m->userVerification_m($username,$password);

			if($response){
				$data["success"] = true;
				$this->session->set_userdata($response);
			}
			echo json_encode($data);
        }

        function userVerificationapprvr_c(){
            $data["success"] = false;

			$username = $this->input->post("txtnmUsername");
            $password = $this->input->post("txtnmPassword");

			$response = $this->login_m->userVerificationapprvr_m($username,$password);

			if($response){
				$data["success"] = true;
				$this->session->set_userdata($response);
			}
			echo json_encode($data);
        }

        function userVerificationexe_c(){
            $data["success"] = false;

			$username = $this->input->post("txtnmUsername");
            $password = $this->input->post("txtnmPassword");

			$response = $this->login_m->userVerificationexe_m($username,$password);

			if($response){
				$data["success"] = true;
				$this->session->set_userdata($response);
			}
			echo json_encode($data);
        }

        function userLogout_c(){
            $data["success"] = false;

            $username = $this->input->post("txtnmUsername");

            $response = $this->login_m->userLogout_m($username);

            if($response){
                $data["success"] = true;
                unset($_SESSION['username']);
            }
            echo json_encode($data);
		}
    }
    
?>
