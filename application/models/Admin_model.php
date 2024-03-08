<?php


class Admin_model extends CI_model
{
  // FEBY
  public function getAlljabatan()
  {
    $sql = "SELECT * from jabatan";
    $result = $this->db->query($sql);
    return $result->result_array();
  }
  public function getAllDetail()
  {
    $sql = "SELECT * from user where role_id=2";
    $result = $this->db->query($sql);
    return $result->result_array();
  }
  // 

  public function getAllpegawai()
  {
    $sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai, jabatan where jabatan.id_jabatan=tb_pegawai.jabatan";
    $result = $this->db->query($sql);
    return $result->result_array();
  }
  public function getAllTotalMsk($id, $thn, $thn2)
  {
    $sql = "SELECT COUNT(DISTINCT propinsi) as total_masuk FROM tb_presents where id_pegawai=$id  and tb_presents.keterangan=2 and tb_presents.tanggal between '$thn' and '$thn2'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
  public function getDetailpegawai($id)
  {
    $sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai, jabatan where jabatan.id_jabatan=tb_pegawai.jabatan and tb_pegawai.id_pegawai='$id'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }

  public function getAlllemburByDate()
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT tb_pegawai.id_pegawai as idpeg, tb_pegawai.nama_pegawai, tb_lembur.*  from tb_pegawai,tb_lembur where tb_pegawai.id_pegawai=tb_lembur.id_pegawai and tb_lembur.date='$tgl_skrng'";
    $result = $this->db->query($sql);
    return $result->result_array();
  }
  public function getAllKonfirmasiByDate()
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT tb_presents.*, tb_pegawai.nama_pegawai from tb_presents,tb_pegawai where tb_pegawai.id_pegawai=tb_presents.id_pegawai and tb_presents.tanggal='$tgl_skrng'";
    $result = $this->db->query($sql);
    return $result->result_array();
  }
  public function getPegawaiByLemburTanggal()
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT tb_lembur.* from tb_lembur,tb_presents where tb_lembur.id_pegawai=tb_presents.id_pegawai and tb_presents.tanggal='$tgl_skrng'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
  public function getJabatanPegawaiGajiByid($id_peg)
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT jabatan.* from jabatan,tb_pegawai where jabatan.id_jabatan=tb_pegawai.jabatan and tb_pegawai.id_pegawai=$id_peg";
    $result = $this->db->query($sql);
    return $result->row();
  }

  public function InsertTbLembur($id_peg)
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "UPDATE tb_lembur SET status = 1 WHERE date ='$tgl_skrng' and id_pegawai='$id_peg'";
    $result = $this->db->query($sql);
    return $result;
  }

  public function getTahun()
  {
    $this->db->select('year(tanggal) as th');
    $this->db->from('tb_presents');
    $this->db->group_by('year(tanggal)');
    return $this->db->get()->result_array();
  }
  public function getBln()
  {
    $this->db->select('month(tanggal) as bln');
    $this->db->from('tb_presents');
    $this->db->group_by('month(tanggal)');
    return $this->db->get()->result_array();
  }
  public function getTahun_gaji()
  {
    $this->db->select('year(tanggal) as th');
    $this->db->from('tb_payrol');
    $this->db->group_by('year(tanggal)');
    return $this->db->get()->result_array();
  }
  public function getBln_gaji()
  {
    $this->db->select('month(tanggal) as bln');
    $this->db->from('tb_payrol');
    $this->db->group_by('month(tanggal)');
    return $this->db->get()->result_array();
  }
  public function getAllAbsen($tgl1, $tgl2, $id)
  {
    $sql = "SELECT tb_presents.*, tb_pegawai.nama_pegawai,jabatan.jabatan as namjab from tb_presents,jabatan, tb_pegawai  where 
        tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan and tb_presents.id_pegawai='$id' and tb_presents.tanggal between '$tgl1' and '$tgl2'";
    $result = $this->db->query($sql);
    return $result->result_array();
  }

  public function getAllGajiByDate($tgl1, $tgl2)
  {
    $sql = "SELECT tb_pegawai.nama_pegawai,jabatan.jabatan as namjab,jabatan.id_jabatan, tb_payrol.* from tb_payrol,jabatan, tb_pegawai  where 
        tb_payrol.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan and tb_payrol.periode between '$tgl1' and '$tgl2'";
    $result = $this->db->query($sql);
    return $result->result_array();
  }


  public function getAllGajiByDateID($tgl1, $tgl2, $id_peg)
  {
    $sql = "SELECT tb_pegawai.nama_pegawai,jabatan.jabatan as namjab,jabatan.id_jabatan, tb_payrol.* from tb_payrol,jabatan, tb_pegawai  where 
        tb_payrol.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan and tb_payrol.id_pegawai='$id_peg' and tb_payrol.periode between '$tgl1' and '$tgl2'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }


  public function getAllLemburPegawai($tgl1, $tgl2)
  {

    // $sql = "SELECT DISTINCT tb_pegawai.nama_pegawai, jabatan.jabatan as namjab,
    //             (select COUNT(keterangan) from tb_presents where keterangan='3') as jumlem,
    //             (select COUNT(keterangan) from tb_presents where keterangan='2') as masuk,
    //             (select COUNT(keterangan) from tb_presents where keterangan='4') as sakit,
    //             (select COUNT(keterangan) from tb_presents where keterangan='5') as izin
    //              from tb_presents,jabatan, tb_pegawai  where tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan 
    //             and tb_presents.tanggal between '$tgl1' and '$tgl2' GROUP BY tb_presents.id_pegawai;
    //     ";

    $sql = "SELECT DISTINCT tb_pegawai.nama_pegawai, jabatan.jabatan as namjab,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '3') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS jumlem,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '2') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS masuk,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '4') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS sakit,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '5') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS izin
    from tb_presents,jabatan, tb_pegawai  where tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan 
    and tb_presents.tanggal between '$tgl1' and '$tgl2' GROUP BY tb_presents.id_pegawai";
    $result = $this->db->query($sql);
    return $result->result_array();
  }

  public function getAllLemburPegawaiById($tgl1, $tgl2, $id_peg)
  {
    // nanti edit select COUNT(keterangan) from tb_presents where keterangan='3' and tanggal between '$tgl1' and '$tgl2' and id_pegawai='$id_peg';
    $sql = "SELECT DISTINCT tb_pegawai.nama_pegawai, jabatan.jabatan as namjab,
                (SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '3') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS jumlem,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '2') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS masuk,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '4') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS sakit,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '5') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS izin
                 from tb_presents,jabatan, tb_pegawai  where tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan 
                and tb_presents.tanggal between '$tgl1' and '$tgl2' and tb_presents.id_pegawai='$id_peg';
        ";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
  public function getDetailAbsen($id)
  {
    $sql = "SELECT tb_presents.*, tb_pegawai.nama_pegawai,jabatan.jabatan as namjab from tb_presents,jabatan, tb_pegawai  where 
        tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan and tb_presents.id_presents='$id'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
  public function getAllpegawaiByid($id)
  {
    $sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai, jabatan where tb_pegawai.jabatan=jabatan.id_jabatan and tb_pegawai.id_pegawai='$id'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
}

    // febyy tutup
