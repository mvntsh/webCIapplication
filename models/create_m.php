<?php 
	/**
	 * 
	 */
	class create_m extends CI_Model
	{
		public function __construct(){
			$this->load->database();
		}

		function insertData_m($values){
			$this->db->insert('news',$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>