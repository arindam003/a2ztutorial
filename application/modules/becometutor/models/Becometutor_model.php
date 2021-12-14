<?php

	if(!defined('BASEPATH')){ exit ('No direct script access allowed') ;}



	class Becometutor_model extends CI_Model{



		function get_becometutor(){

			$this->db->select('*');

			$this->db->where('page_slug','becometutor');

			$query = $this->db->get('pages_mng');

			$result = $query->result();

			return $result;



		}

		function get_becometutor_mid(){

			$this->db->select('*');
			$this->db->where('status','1');

			$query = $this->db->get('tbl_becometutor');

			$result = $query->result();

			return $result;
		}



		function get_usertype(){

			$this->db->select('*');

			$this->db->where('type_id','3');

			$query = $this->db->get('tbl_usertype');

			$result = $query->result();

			return $result;



		}



		function get_testimonials(){

		    $this->db->select('*');

	        $this->db->where('usertype_id','3');

	        $query = $this->db->get('tbl_signup');

		    $result = $query->result();

	        return $result;

      	}

		// function get_testimonials(){

		//     $this->db->select('*');

	 //       // $this->db->where('usertype','Teacher');

	 //        $query = $this->db->get('tbl_testimonials');

		//     $result = $query->result();

	 //        return $result;

  //     	}



		



	}

?>