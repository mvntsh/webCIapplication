<?php 
	/**
	 * 
	 */
	class requestentry_m extends CI_Model
	{
		
		function __construct(){
			$this->load->database();
		}

		function insert_m($values){
			$this->db->insert('tblrequest',$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

		function checkRfpno_m($rfpno){
			$query = $this->db->query("SELECT rfpno FROM `tblrequest` WHERE rfpno='$rfpno'")->result_array();

			if($query){
				return $query;
			}else{
				return array();
			}
		}
	}
?>