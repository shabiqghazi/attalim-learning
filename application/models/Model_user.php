<?php
class Model_user extends CI_Model {
  public function registration($user){
    $this->db->insert('user', $user);
    return $this->db->affected_rows();
  }
  public function getUserByUsername($username){
    $user = $this->db->get_where('user',['username' => $username])->row_array();
		return $user;
  }
  public function getGuruTanpaMapel(){
    $query = "SELECT * FROM user
              WHERE user.user_id NOT IN (
                SELECT guru_id FROM mapel
              ) AND user.role_id = 1";
    return $this ->db->query($query)->result_array();
  }
  public function getJumlahSiswa(){
    return $this->db->get_where('user', ['role_id' => 2])->num_rows();
  }
  public function getJumlahGuru(){
    return $this->db->get_where('user', ['role_id' => 1])->num_rows();
  }
}
