<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

      
     function __construct() {
     	parent::__construct();
        $this->load->model('usersModel');
        //$this->load->helper('url');
        //$this->load->helper('form');
      }



	public function addUser($numero)
	{
		$data = array(
	   "name" => $this->input->post('name'),
     "lastname" => $this->input->post('lastname'),
     "twitter" => $this->input->post('twitter'),
     "web" => $this->input->post('web')
       );
    //Para saber si hay que insertar o modificar.
    if ($numero != 1) {
		  $this->usersModel->insertUser($data);
     }else{
      $this->usersModel->updateUser($data);
     }
     
	}

public function getUsers(){
  echo "<h1>Los usuarios de la base de datos son : </h1>";
  $users = $this->usersModel->getAllUsers();
  
  if($users != FALSE) {
    foreach ($users->result() as $row){
      echo "<a href=\"http://".$row->web."\">".
      $row->name." ".$row->lastname." ".$row->twitter."</a>"." "."<a href=\"getupdateuser/".$row->name."\">Actualizar usuario</a><br />";    
    }

    }else{
      echo "<h3>Base de datos vacía</h3>";
    }

}
public function delete(){
$this->load->view('deleteuser');

}
public function delUser(){
  $del = $this->input->post('name');
  $this->usersModel->deleteUser($del);
}

public function getUpdateUser($name){
  $update =$this->usersModel->getUser($name);
  $data;
  foreach ($update->result()as $row){
    $data =array(
      "name"=>$row->name,
      "lastname"=>$row->lastname,
      "twitter"=>$row->twitter,
      "web"=>$row->web);
  }
  $this->load->view('updateuser',$data);
}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */