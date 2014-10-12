<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usersModel extends CI_Model {
	
      
     function __construct() {
     	parent::__construct();
     	
     	}

     function getAllUsers() {
          $data = $this->db->get('users');
          if ($data->num_rows() > 0) {
               return $data;
          }else{
               
          return FALSE;
          }
     }
     function insertUser($data) {
          $this->db->insert('users',$data);
          echo "Usuario guardado";

     }
     function updateUser($data) {
      $this->db->where('name',$data['name']);
      $this->db->update('users',$data);
      echo "Usuario modificado";
      echo "<a href=\"/codeigniter\">Volver</a>";


     }
     function deleteUser($del) {
      if ($del) {
          $this->db->where('name',$del);
          $this->db->delete('users');
          echo "usuario borrado";
      }else{
          echo "usuario no existe";
      }

     }
     function getUser($name) {
      $this->db->where('name',$name);
      $update = $this->db->get('users');
      return $update;
          
     }


}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */