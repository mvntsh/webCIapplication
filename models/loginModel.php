<?php 
	/**
		 * 
		 */
		class loginModel extends CI_Model
		{
			function q_login($username,$password){
				$query = $this->db->query("SELECT * FROM tblusers WHERE cis_uusername='$username' AND cis_upassword='$password' AND cis_division='FD'")->result_array();

				if(count($query)>0){
					return $query[0];
				}else{
					return false;
				}
			}

			function viewD_m($username,$password){
				$query = $this->db->query("SELECT * FROM `tblusers` WHERE cis_uusername='$username' AND cis_upassword='$password'")->result_array();

				if(count($query)>0){
					return $query;
				}else{
					return array();
				}
			}
		}	
?>