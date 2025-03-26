<?php 
	/**
	 * 
	 */
	class checkentry_m extends CI_Model
	{
		
		function __construct(){
			$this->load->database();
		}

		function viewForprocess_m(){
			$query = $this->db->query("SELECT * FROM `tblrequest` WHERE marked='2'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function searchForprocess_m($rfpno){
			$query = $this->db->query("SELECT * FROM `tblrequest` WHERE rfpno='$rfpno' AND marked='2'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function saveData_m($values){
			$this->db->insert("tblvouchers",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

		function updateRS_m($rfpno,$values){
			$this->db->where("rfpno",$rfpno);
			$this->db->update("tblrequest",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>