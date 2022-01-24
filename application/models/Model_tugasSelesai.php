<?php
class Model_tugasSelesai extends CI_Model {
  public function cekTugasSelesai($user_id, $tugas_id){
    $result = $this->db->get_where('tugas_selesai', ['user_id' => $user_id, 'tugas_id' => $tugas_id])->num_rows();
    return ($result > 0);
  }
  public function viewTugasSelesai($user_id, $tugas_id){
    $tugasSelesai = $this->db->get_where('tugas_selesai', ['user_id' => $user_id, 'tugas_id' => $tugas_id])->row_array();
    return $tugasSelesai;
  }
  public function submitTugas($tugasSelesai){
    $this->db->insert('tugas_selesai', $tugasSelesai);
    return $this->db->affected_rows();
  }
  public function editTugas($tugasSelesai, $tugasSelesai_id){
    $this->db->where('tugas_selesai_id', $tugasSelesai_id);
    $this->db->update('tugas_selesai', $tugasSelesai);
    return $this->db->affected_rows();
  }
  public function removeTugasSelesaiByTugasId($tugas_id, $user_id){
    $this->db->where(['tugas_id' => $tugas_id, 'user_id' => $user_id]);
    $this->db->delete('tugas_selesai');
    return $this->db->affected_rows();
  }
  public function getJumlahTugasSelesai($user_id){
    return $this->db->get_where('tugas_selesai', ['user_id' => $user_id])->num_rows();
  }
  public function getTugasSelesaiByTugasId($tugas_id){
    $query = "SELECT * FROM tugas_selesai JOIN user
              ON tugas_selesai.user_id = user.user_id
              JOIN tugas
              ON tugas_selesai.tugas_id = tugas.tugas_id
              WHERE tugas_selesai.tugas_id = $tugas_id";
    return $this->db->query($query)->result_array();
  }
  public function getTugasSelesaiById($tugas_selesai_id){
    $query = "SELECT * FROM tugas_selesai JOIN user
              ON tugas_selesai.user_id = user.user_id
              JOIN tugas
              ON tugas_selesai.tugas_id = tugas.tugas_id
              WHERE tugas_selesai.tugas_selesai_id = $tugas_selesai_id";
    return $this->db->query($query)->row_array();
  }
}
