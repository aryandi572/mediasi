<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class MedModel extends CI_Model{

  public function m_getURLS(){
    $this->db->where('POSTING', 1);
		return $this->db->get('artikel')->result_array();
	}

//--------------------------------------------------------------------------counter view
  public function m_cek_stat($ip, $tanggal, $id_ar){
      $hsl = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND ID_ARTIKEL='$id_ar'");
      return $hsl;
  }

  public function m_set_stat($ip, $tanggal, $id_ar){
    $this->db->query("INSERT INTO statistik(ip, tanggal, id_artikel) VALUES('$ip','$tanggal','$id_ar')");
  }

  public function m_upd_stat($ip, $tanggal, $id_ar){
    $this->db->query("UPDATE statistik SET hits=hits+1 WHERE ip='$ip' AND tanggal='$tanggal' AND id_artikel='$id_ar'");
  }

  public function m_view_stat($id_ar){
    $hsl = $this->db->query("SELECT * FROM statistik WHERE id_artikel='$id_ar'");
    return $hsl->num_rows();
  }

  public function m_upd_artikel_stat($id, $hits){
    $this->db->query("UPDATE pengunjung SET jml_pengunjung='$hits' WHERE id_artikel='$id'");
  }

  public function m_insert_artikel_stat($id, $hits){
    $this->db->query("INSERT INTO pengunjung(id_artikel, jml_pengunjung) VALUES('$id', '$hits')");
  }

  public function m_cek_artikel_stat_id($id){
    $hsl = $this->db->query("SELECT * FROM pengunjung WHERE id_artikel='$id'");
    return $hsl->num_rows();
  }

  //---------------------------------------------------------------------added part user
  public function get_current_page_records($limit, $start) {
    $this->db->where('POSTING','1');
    $this->db->limit($limit, $start);
    $this->db->order_by('TANGGAL_ARTIKEL', 'DESC');
    $query = $this->db->get("artikel");

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function m_count_all_artikel(){
    $this->db->where('POSTING','1');
    $result = $this->db->get('artikel')->num_rows();
    return $result;
  }

  public function m_readArtikel_title($jdl){
    $this->db->where('JUDUL_ARTIKEL', $jdl);
		return $this->db->get('artikel')->row();
  }

  public function m_subscribe($mail){
    $this->db->query("INSERT INTO langganan(email) values('$mail')");
  }

  public function m_searching($search){
    $this->db->like('JUDUL_ARTIKEL',$search);
    $this->db->or_like('KATEGORI',$search);
    $this->db->or_like('ISI_ARTIKEL',$search);
    $this->db->or_like('LABEL',$search);
    $this->db->order_by("TANGGAL_ARTIKEL", "DESC");
    $query = $this->db->get('artikel');
    return $query;
  }

  public function m_popular($upto){
    $hsl = $this->db->query("SELECT DISTINCT artikel.* from artikel join pengunjung on artikel.ID_ARTIKEL = pengunjung.ID_ARTIKEL ORDER BY pengunjung.JML_PENGUNJUNG DESC LIMIT 0, $upto");
    return $hsl->result();
  }

  public function m_get_kategori($kategori){
    $this->db->where('POSTING',1);
    $this->db->where('KATEGORI',$kategori);
    $this->db->order_by("TANGGAL_ARTIKEL", "DESC");
    $query = $this->db->get('artikel');
    return $query->result();
  }
  //---------------------------------------------------------------------part administrator
  public function m_set_code($id, $status){
      $this->db->query("UPDATE autentikasi SET status='$status' WHERE id_kode='$id'");
  }

  public function m_add_writer($name, $gender, $job, $about, $email, $passwordx, $image, $id_code){
    $this->db->query("INSERT INTO penulis(nama, jenis_kelamin, pekerjaan, tentang, email_user, password, gambar, id_kode) VALUES ('$name', '$gender', '$job', '$about', '$email', '$passwordx', '$image', '$id_code')");
  }

  public function m_get_code($kode){
    $hsl = $this->db->query("SELECT * FROM autentikasi WHERE kode='$kode'");
		return $hsl;
  }

  public function m_verify($mail, $pass){
    $hsl = $this->db->query("SELECT * FROM penulis WHERE email_user='$mail' AND password='$pass'");
		return $hsl;
	}

  //----set password
  public function m_change_pass($mail, $pass){
    $this->db->query("UPDATE penulis SET password='$pass' WHERE email_user='$mail'");
  }

  //----------------artikel
  public function m_readAll_artikel(){
    $hsl=$this->db->query("SELECT * FROM artikel ORDER BY tanggal_artikel DESC");
    return $hsl->result();
  }

  public function m_readArtikel_by($id){
		$this->db->where('ID_ARTIKEL', $id);
		return $this->db->get('artikel')->row();
	}

  public function m_create_post($ktg, $jdl, $isi, $gambar, $user, $tag, $posting){
		$hsl = $this->db->query("INSERT INTO artikel(kategori, judul_artikel, isi_artikel, gambar_artikel, tanggal_artikel, penulis, label, posting) VALUES ('$ktg', '$jdl', '$isi', '$gambar', now(), '$user', '$tag', '$posting')");
		return $hsl;
	}

  public function m_del_mypost($id){
    $this->db->where('ID_ARTIKEL', $id);
		$this->db->delete('artikel');
  }

  public function m_upd_mypost($id, $ktg, $jdl, $isi, $gambar, $tag, $posting){
    $hsl = $this->db->query("UPDATE artikel SET kategori='$ktg', judul_artikel='$jdl', isi_artikel='$isi', gambar_artikel='$gambar', tanggal_artikel=now(), label='$tag', posting='$posting' WHERE id_artikel='$id'");
  }

  public function m_srch_artikel($search){
    $this->db->like('JUDUL_ARTIKEL',$search);
    $this->db->or_like('KATEGORI',$search);
    $this->db->order_by("TANGGAL_ARTIKEL", "DESC");
    $query = $this->db->get('artikel');
    return $query->result();
  }

  public function m_count_artikel($user){
    $user = strtolower($user);
    $this->db->where('PENULIS',$user);
    $this->db->where('POSTING','1');
    $result = $this->db->get('artikel')->num_rows();
    return $result;
  }

  //----------------histori
  public function m_readAll_histori(){
    $hsl = $this->db->query("SELECT * FROM histori ORDER BY id_histori DESC");
    return $hsl->result();
  }

  //--------------------utama
  public function m_popular_by($user, $upto){
    $hsl = $this->db->query("SELECT DISTINCT artikel.* FROM artikel join pengunjung on artikel.ID_ARTIKEL = pengunjung.ID_ARTIKEL AND artikel.PENULIS='$user' AND artikel.POSTING='1' ORDER BY pengunjung.JML_PENGUNJUNG DESC LIMIT 0, $upto");
    return $hsl->result();
  }

  public function m_kategori($user){
    $hsl = $this->db->query("SELECT DISTINCT KATEGORI FROM artikel WHERE PENULIS='$user' AND POSTING='1'");
    return $hsl->result();
  }

  public function m_count_kategori($user, $ktg){
    $hsl = $this->db->query("SELECT * FROM artikel WHERE POSTING='1' AND PENULIS='$user' AND KATEGORI='$ktg'");
    return $hsl->num_rows();
  }

  public function m_get_artikel_info($user, $ket){//serbaguna get jml pengunjung, id artikel, isi_artikel
    $hsl = $this->db->query("SELECT DISTINCT * FROM pengunjung join artikel on pengunjung.ID_ARTIKEL = artikel.ID_ARTIKEL AND artikel.PENULIS='$user' AND artikel.POSTING=$ket ORDER BY pengunjung.JML_PENGUNJUNG DESC");
    return $hsl->result();
  }

  //-----------Profile
  public function m_data_penulis($user){
    $this->db->where('NAMA', $user);
		return $this->db->get('penulis')->row();
  }

  public function m_cek_mail($mail){
    $this->db->where('EMAIL_USER', $mail);
		return $this->db->get('penulis')->num_rows();
  }
}
