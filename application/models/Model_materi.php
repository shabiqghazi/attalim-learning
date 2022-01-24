<?php
class Model_materi extends CI_Model {
  public function tambahMateri($materi){
    $this->db->insert('materi',$materi);
		return $this->db->affected_rows();
  }
  public function getMateri(){
    $query = "SELECT * FROM materi JOIN mapel
              ON materi.mapel_id = mapel.mapel_id
              ORDER BY materi_id DESC";
    $materi = $this->db->query($query)->result_array();
    return $materi;
  }
  public function getMateriByGuruId($guru_id){
    $query = "SELECT * FROM materi JOIN mapel
              ON materi.mapel_id = mapel.mapel_id
              WHERE mapel.guru_id = $guru_id
              ORDER BY materi_id DESC";
    $materi = $this->db->query($query)->result_array();
    return $materi;
  }
  public function getMateriById($materi_id){
    $query = "SELECT * FROM materi JOIN mapel
              ON materi.mapel_id = mapel.mapel_id
              WHERE materi_id = " . $materi_id;
    return $this->db->query($query)->row_array();
  }
  public function getMateriByMapelId($mapel_id){
    $this->db->order_by('materi_id', 'DESC');
    return $this->db->get_where('materi', ['mapel_id' => $mapel_id])->result_array();
  }
  public function ubahMateri($materi, $materi_id){
    $this->db->where('materi_id', $materi_id);
		$this->db->update('materi', $materi);
		return $this->db->affected_rows();
  }
  public function hapusMateri($materi_id){
    $this->db->where('materi_id', $materi_id);
    $this->db->delete('materi');
    return $this->db->affected_rows();
  }
  public function getJumlahMateriGuru($mapel_id){
    return $this->db->get_where('materi', ['mapel_id' => $mapel_id])->num_rows();
  }
  public function getJumlahMateri(){
    return $this->db->get('materi')->num_rows();
  }
}
