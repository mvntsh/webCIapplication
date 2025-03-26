<?php 
	/**
	 * 
	 */
	class requesterhome_m extends CI_Model
	{
		
		function __construct(){
			$this->load->database();
		}

		function viewRequest_m($division){
			$query = $this->db->query("SELECT * FROM `tblrequest` WHERE division='$division' ORDER BY rfpno DESC LIMIT 50;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function searchData_m($division,$search){
			$query = $this->db->query("SELECT * FROM `tblrequest` WHERE division='$division' AND rfpno LIKE '$search%' OR payee LIKE '$search' ORDER BY rfpno DESC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function viewSummary_m($division){
			$query = $this->db->query("SELECT requeststatus,count(*) as trxnCount FROM `tblrequest` WHERE division='$division' GROUP BY requeststatus")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}
	}
?>