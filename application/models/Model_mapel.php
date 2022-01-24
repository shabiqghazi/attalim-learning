<?php
class Model_mapel extends CI_Model {
  public function getMapelGuruByUsername($username){
    $user = $this->db->get_where('user',['username' => $username])->row_array();
    $mapel = $this->db->get_where('mapel',['guru_id' => $user['user_id']])->row_array();
		return $mapel;
  }
  public function getMapel(){
    $query = "SELECT * FROM mapel JOIN user
              ON mapel.guru_id = user.user_id";
    return $this->db->query($query)->result_array();
  }
  public function getMapelById($mapel_id){
    $query = "SELECT * FROM mapel JOIN user
              ON mapel.guru_id = user.user_id
              WHERE mapel.mapel_id = $mapel_id";
    return $this->db->query($query)->row_array();
  }
  public function tambahMapel($mapel){
    $this->db->insert('mapel', $mapel);
    return $this->db->affected_rows();
  }
  public function ubahMapel($mapel, $mapel_id){
    $this->db->where('mapel_id', $mapel_id);
    $this->db->update('mapel', $mapel);
    return $this->db->affected_rows();
  }
  public function hapusMapel($mapel_id){
    $this->db->where('mapel_id', $mapel_id);
    $this->db->delete('mapel');
    return $this->db->affected_rows();
  }
  public function getJumlahMapel(){
    return $this->db->get('mapel')->num_rows();
  }
}