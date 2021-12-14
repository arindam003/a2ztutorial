<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	
	
	function validate()
	{
		
		//first check if the user exit into our new user_master table 
		
		$this->db->where('email', $this->input->post('name'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('status','1');
		$query = $this->db->get('tbl_users');
		$row = $query->row();
		
		
		
		if($query->num_rows() > 0)
		{
		
			////*** variable name => field name

			$data = array(
			'user_code'			=> $row->user_code,	
			'email' 			=> $row->email,			
			'mobile' 			=> $row->mobile,
			'name'     			=> $row->name,
			'profile_url'     	=> $row->profile_url,
			'is_logged_in' 		=> true,
			);
			$this->session->set_userdata($data);
			
 
			return TRUE;
			
		}
		
		
		
	}
	

	

				
}