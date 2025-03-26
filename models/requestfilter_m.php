<?php 
	/**
	 * 
	 */
	class requestfilter_m extends CI_Model
	{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function viewRequest_m(){
			$query = $this->db->query("SELECT *,CASE WHEN `marked`>='2' THEN 'disabled' ELSE '' END AS disabledButton FROM `tblrequest` ORDER BY rfpno DESC LIMIT 50;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function searchData_m($searched){
			$query = $this->db->query("SELECT *,CASE WHEN `marked`>='2' THEN 'disabled' ELSE '' END AS disabledButton FROM `tblrequest` WHERE rfpno LIKE '$searched%' OR payee LIKE '%$searched%' ORDER BY request_id DESC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function getData_m($request_id){
			$query = $this->db->query("SELECT * FROM `tblrequest` WHERE request_id='$request_id'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function exactAmount_m($request_id){
			$query = $this->db->query("SELECT * FROM `tblrequest` WHERE amount LIKE '%.00' AND request_id='$request_id'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}
	}
?>