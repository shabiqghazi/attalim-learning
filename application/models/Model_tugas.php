<?php
class Model_tugas extends CI_Model {
  public function tambahTugas($tugas){
    $this->db->insert('tugas',$tugas);
		return $this->db->affected_rows();
  }
  public function getTugas(){
    $query = "SELECT * FROM tugas JOIN mapel
              ON tugas.mapel_id = mapel.mapel_id
              ORDER BY tugas_id DESC";
    $tugas = $this->db->query($query)->result_array();
    return $tugas;
  }
  public function getTugasByGuruId($guru_id){
    $query = "SELECT * FROM tugas JOIN mapel
              ON tugas.mapel_id = mapel.mapel_id
              WHERE mapel.guru_id = $guru_id
              ORDER BY tugas_id DESC";
    $tugas = $this->db->query($query)->result_array();
    return $tugas;
  }
  public function getTugasById($tugas_id){
    $query = "SELECT * FROM tugas JOIN mapel
              ON tugas.mapel_id = mapel.mapel_id
              WHERE tugas_id = " . $tugas_id;
    return $this->db->query($query)->row_array();
  }
  public function getTugasByMapelId($mapel_id){
    $this->db->order_by('tugas_id', 'DESC');
    return $this->db->get_where('tugas', ['mapel_id' => $mapel_id])->result_array();
  }
  public function ubahTugas($tugas, $tugas_id){
    $this->db->where('tugas_id', $tugas_id);
		$this->db->update('tugas', $tugas);
		return $this->db->affected_rows();
  }
  public function hapusTugas($tugas_id){
    $this->db->where('tugas_id', $tugas_id);
    $this->db->delete('tugas');
    return $this->db->affected_rows();
  }
  public function getJumlahTugasGuru($mapel_id){
    return $this->db->get_where('tugas', ['mapel_id' => $mapel_id])->num_rows();
  }
  public function getJumlahTugas(){
    return $this->db->get('tugas')->num_rows();
  }
}