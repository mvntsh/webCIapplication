<?php 
	/**
	 * 
	 */
	class checkprint_m extends CI_Model
	{
		
		function __construct(){
			$this->load->database();
		}

		function viewProcessed_m(){
			$query = $this->db->query("SELECT *,CASE WHEN `voucherstatus`='On-hand' THEN 'disabled' ELSE '' END AS disabledButton FROM `tblvouchers` WHERE voucherstatus='On-hand' AND formtype='1' ORDER BY checkno DESC LIMIT 50;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function spellVoucherdate_m($voucherdate,$checkdate){
			$query = $this->db->query("SELECT DATE_FORMAT('$voucherdate','%M %d, %Y') AS spellDate,DATE_FORMAT('$checkdate','%m/%d/%Y') AS arrangeDate")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function wholeNumber_m($voucherid){
			$query = $this->db->query("SELECT amount FROM `tblvouchers` WHERE voucher_id='$voucherid' AND amount LIKE '%.00'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function viewSearched_m($searched){
			$query = $this->db->query("SELECT *,CASE WHEN `voucherstatus`='On-hand' THEN 'disabled' ELSE '' END AS disabledButton FROM `tblvouchers` WHERE checkno='$searched' AND voucherstatus='On-hand' AND formtype='1'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function updateRS_m($rfpno,$set){
			$this->db->where("rfpno",$rfpno);
			$this->db->update("tblrequest",$set);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>