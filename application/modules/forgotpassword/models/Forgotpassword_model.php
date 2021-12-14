<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpassword_model extends CI_Model {

  function mail_exists($email) {
        $this->db->select('*');
        $this->db->where('email',$email);
        $query = $this->db->get('tbl_signup');
        //echo $this->db->last_query();die;
       return $query->num_rows();
    }

 function get_user_data($email){
      $this->db->select('*');
      $this->db->where('email', $email);
      $query = $this->db->get('tbl_signup');
      $result = $query->result();
      return $result;
   }
  // Update passwordData   
  function update_data($table,$data,$token) 
    {
      if(!empty($data))
      {
         $this->db->where('user_token',$token);
               $this->db->update($table, $data);
               return $this->db->affected_rows();
      }
    }

     // function updatedAt($id) {
     //    $this->db->table('tbl_signup');
     //    $this->db->where('id',$id);
         
     //    $this->db->update(['updated_on'=>date('h:i:s')]);
     //    //echo $this->db->last_query();die;
     //    return $this->db->affected_rows();
     //  }
  
    public function update_token($email,$user_token,$token_time){
        $data = array(
               'user_token' => $user_token,
               'token_time' =>$token_time
               // 'updated_on' =>$token_time
            );
      $this->db->where('email',$email);
      $this->db->update('tbl_signup', $data);
       return true;
    }

    function token_timing($get_token){
      $this->db->select('*');
     // $this->db->where('id', $get_token);
       $this->db->where('user_token', $get_token);
      $query = $this->db->get('tbl_signup');
      //echo $this->db->last_query();die;
      $result = $query->result();
      return $result;
    }

   
  
	



				
}
?>