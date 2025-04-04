<?php 
	/**
	 * 
	 */
	class receivedentry_m extends CI_Model
	{
		
		function __construct(){
			$this->load->database();
		}

		function viewRequest_m($recipient){
			$query = $this->db->query("SELECT *,CASE WHEN `marked`='2' THEN 'hidden' ELSE '' END AS modifyCheck FROM `tblrequest` WHERE recipient='$recipient' ORDER BY rfpno DESC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function viewRequestexe_m($recipient){
			$query = $this->db->query("SELECT *,CASE WHEN `marked`='2' THEN 'hidden' ELSE '' END AS modifyCheck FROM `tblrequest` WHERE recipient='$recipient' ORDER BY rfpno DESC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function viewRequestdate_m($daterequested,$recipient){
			$query = $this->db->query("SELECT *,CASE WHEN `marked`='2' THEN 'hidden' ELSE '' END AS modifyCheck FROM `tblrequest` WHERE daterequested='$daterequested' AND recipient='$recipient' ORDER BY rfpno DESC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function searchData_m($searched,$recipient){
			$query = $this->db->query("SELECT *,CASE WHEN `marked`='2' THEN 'hidden' ELSE '' END AS modifyCheck FROM `tblrequest` WHERE recipient='$recipient' AND payee LIKE '%$searched%' OR rfpno LIKE '%$searched%' ORDER BY rfpno DESC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function updateMarked_m($request_id,$values){
			$this->db->where("request_id",$request_id);
			$this->db->update("tblrequest",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

		function verifyMark_m(){
			$query = $this->db->query("SELECT * FROM `tblrequest` WHERE marked='1'")->result_array();

			if($query){
				return true;
			}else{
				return false;
			}
		}

		function updateStatus_m($values){
			$this->db->where("marked","2");
			$this->db->update("tblrequest",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

		function updateMarkedbydate_m($daterequested,$values){
			$this->db->where("daterequested","$daterequested");
			$this->db->update("tblrequest",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>
