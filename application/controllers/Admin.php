<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('masuk_admin') != TRUE) {
      $url = base_url('auth');
      redirect($url);
    };
    $this->load->library('form_validation');
    $this->load->model('Admin_model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // $data['hitung_pegawai'] = $this->Admin_model->getAlljabatan();
    // $data['hitung_absen_hari_ini'] = $this->Admin_model->getAlljabatan();
    // $data['laporan_absensi'] = $this->Admin_model->getAlljabatan();
    // $data['gaji_pegawai'] = $this->Admin_model->getAlljabatan();

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/dashboard/index', $data);
    $this->load->view('backend/template/footer');
  }

  public function visi_misi()
  {
    $data['title'] = 'Dashboard';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // $data['hitung_pegawai'] = $this->Admin_model->getAlljabatan();
    // $data['hitung_absen_hari_ini'] = $this->Admin_model->getAlljabatan();
    // $data['laporan_absensi'] = $this->Admin_model->getAlljabatan();
    // $data['gaji_pegawai'] = $this->Admin_model->getAlljabatan();

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/dashboard/visimisi', $data);
    $this->load->view('backend/template/footer');
  }

  public function sejarah()
  {
    $data['title'] = 'Dashboard';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // $data['hitung_pegawai'] = $this->Admin_model->getAlljabatan();
    // $data['hitung_absen_hari_ini'] = $this->Admin_model->getAlljabatan();
    // $data['laporan_absensi'] = $this->Admin_model->getAlljabatan();
    // $data['gaji_pegawai'] = $this->Admin_model->getAlljabatan();

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/dashboard/sejarah', $data);
    $this->load->view('backend/template/footer');
  }
  public function jabatan()
  {
    $data['title'] = 'Data Jabatan';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jabatan'] = $this->Admin_model->getAlljabatan();
    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/jabatan/index', $data);
    $this->load->view('backend/template/footer');
  }
  public function tambah_jabatan()
  {
    $data['title'] = 'Data Jabatan';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $jabatan = $this->input->post('jabatan', true);
    $salary = $this->input->post('salary', true);
    $overtime = $this->input->post('overtime', true);
    $data = [
      "jabatan" => $jabatan,
      "salary" => $salary,
      "overtime" => $overtime,

    ];
    $this->db->insert('jabatan', $data);
    $this->session->set_flashdata('flash', 'Berhasil ditambah');
    redirect('admin/jabatan');
  }
  public function edit_jabatan()
  {
    $data['title'] = 'Data Jabatan';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $id_jabatan = $this->input->post('id_jabatan', true);
    $jabatan = $this->input->post('jabatan', true);
    $salary = $this->input->post('salary', true);
    $overtime = $this->input->post('overtime', true);
    $data = [
      "jabatan" => $jabatan,
      "salary" => $salary,
      "overtime" => $overtime,

    ];
    $this->db->where('id_jabatan', $id_jabatan);
    $this->db->update('jabatan', $data);
    $this->session->set_flashdata('flash', 'Berhasil Diperbarui');
    redirect('admin/jabatan');
  }
  public function hapus_jabatan($id)
  {
    $this->db->where('id_jabatan', $id);
    $this->db->delete('jabatan');
    $this->session->set_flashdata('flash', ' Berhasil Dihapus');
    redirect('admin/jabatan');
  }
  public function pegawai()
  {
    $data['title'] = 'Data Pegawai';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pegawai'] = $this->Admin_model->getAllpegawai();
    $data['jabatan'] = $this->Admin_model->getAlljabatan();
    $data['jekel'] = ['L', 'P'];
    $data['stapeg'] = [1, 0];
    $data['agama'] = ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Budha', 'Khonghucu'];
    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/pegawai/index', $data);
    $this->load->view('backend/template/footer');
  }
  public function detail_pegawai($id)
  {
    $data['title'] = 'Data Pegawai';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['detail_pegawai'] = $this->Admin_model->getDetailpegawai($id);

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/pegawai/detail', $data);
    $this->load->view('backend/template/footer');
  }
  public function tambah_pegawai()
  {
    $data['title'] = 'Data Pegawai';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $id_user = $this->input->post('id_user', true);
    $id_pegawai = $this->input->post('id_pegawai', true);
    $nama_pegawai = $this->input->post('nama_pegawai', true);
    $jekel = $this->input->post('jekel', true);
    $pendidikan = $this->input->post('pendidikan', true);
    $status_pegawai = $this->input->post('status_pegawai', true);
    $email = $this->input->post('email', true);
    // $ktp = $this->input->post('ktp', true);
    $agama = $this->input->post('agama', true);
    $jabatan = $this->input->post('jabatan', true);
    $nohp = $this->input->post('nohp', true);
    $alamat = $this->input->post('alamat', true);
    $tgl_msk = $this->input->post('tgl_msk', true);
    $temp = $this->input->post('temp', true);

    //foto dan ktp 
    $upload_image = $_FILES['userfilefoto']['name'];
    $upload_image1 = $_FILES['userfilektp']['name'];
    // var_dump($upload_image1);
    // die;
    if ($upload_image) {
      $config['upload_path']          = './gambar/pegawai/';
      $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
      $config['max_size']             = 10000;
      $config['max_width']            = 10000;
      $config['max_height']           = 10000;
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('userfilefoto')) {
        $new_image = $this->upload->data('file_name');
        $data = $this->db->set('foto', $new_image);
        $gambar_user = $new_image;
      } else {
        echo $this->upload->display_errors();
      }
    }
    //upload foto ktp

    if ($upload_image1) {
      $config['upload_path']          = './gambar/pegawai/';
      $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
      $config['max_size']             = 10000;
      $config['max_width']            = 10000;
      $config['max_height']           = 10000;
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('userfilektp')) {
        $new_image1 = $this->upload->data('file_name');
        $data = $this->db->set('ktp', $new_image1);
      } else {
        echo $this->upload->display_errors();
      }
    }

    // 
    $data = [
      "id_pegawai" => $id_pegawai,
      "id_user" => $id_user,
      "nama_pegawai" => $nama_pegawai,
      "jekel" => $jekel,
      "pendidikan" => $pendidikan,
      "status_kepegawaian" => $status_pegawai,
      "agama" => $agama,
      "jabatan" => $jabatan,
      "no_hp" => $nohp,
      "alamat" => $alamat,
      "tanggal_masuk" => $tgl_msk
    ];
    $this->db->insert('tb_pegawai', $data);

    $data1 = [
      "id" => $id_user,
      "name" => $nama_pegawai,
      "email" => $email,
      "image" => $gambar_user,
      "password" => password_hash('anggota', PASSWORD_DEFAULT),
      'role_id' => 2,
      'is_active' => 1,
      'date_created' => time(),
      'temp' => $temp

    ];
    $this->db->insert('user', $data1);
    $this->session->set_flashdata('flash', 'Berhasil ditambah');
    redirect('admin/pegawai');
  }

  public function export()
  {
    echo "export data karyawan";
  }
  
  public function edit_pegawai()
  {
    $data['title'] = 'Data Pegawai';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $id_pegawai = $this->input->post('id_pegawai', true);
    $id_user = $this->input->post('id_user', true);
    $nama_pegawai = $this->input->post('nama_pegawai', true);
    $jekel = $this->input->post('jekel', true);
    $pendidikan = $this->input->post('pendidikan', true);
    $status_pegawai = $this->input->post('status_pegawai', true);
    $email = $this->input->post('email', true);
    // $ktp = $this->input->post('ktp', true);
    $agama = $this->input->post('agama', true);
    $jabatan = $this->input->post('jabatan', true);
    $nohp = $this->input->post('nohp', true);
    $alamat = $this->input->post('alamat', true);
    $tgl_msk = $this->input->post('tgl_msk', true);
    $temp = $this->input->post('temp', true);


    //foto dan ktp 
    $upload_image = $_FILES['userfilefoto']['name'];
    if ($upload_image) {
      $config['upload_path']          = './gambar/pegawai/';
      $config['allowed_types']        = 'gif|jpg|png|PNG';
      $config['max_size']             = 10000;
      $config['max_width']            = 10000;
      $config['max_height']           = 10000;
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('userfilefoto')) {
        $new_image = $this->upload->data('file_name');
        $data = $this->db->set('foto', $new_image);
        $gambar_user  = $new_image;
      } else {
        echo $this->upload->display_errors();
      }
    }
    //upload foto ktp
    $upload_image1 = $_FILES['userfilektp']['name'];
    if ($upload_image1) {
      $config['upload_path']          = './gambar/pegawai/';
      $config['allowed_types']        = 'gif|jpg|png|PNG';
      $config['max_size']             = 10000;
      $config['max_width']            = 10000;
      $config['max_height']           = 10000;
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('userfilektp')) {
        $new_image = $this->upload->data('file_name');
        $data = $this->db->set('ktp', $new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }

    // 
    $data = [

      "nama_pegawai" => $nama_pegawai,
      "jekel" => $jekel,
      "pendidikan" => $pendidikan,
      "status_kepegawaian" => $status_pegawai,
      "agama" => $agama,
      "jabatan" => $jabatan,
      "no_hp" => $nohp,
      "alamat" => $alamat,
      "tanggal_masuk" => $tgl_msk
    ];
    $this->db->where('id_pegawai', $id_pegawai);
    $this->db->update('tb_pegawai', $data);

    $data1 = [
      "name" => $nama_pegawai,
      "is_active" => $status_pegawai,
      "image" => $gambar_user,
    ];
    $this->db->where('id', $id_user);
    $this->db->update('user', $data1);
    $this->session->set_flashdata('flash', 'Berhasil diperbarui');
    redirect('admin/pegawai');
  }
  public function hapus_pegawai($id, $id_user)
  {
    $this->db->where('id_pegawai', $id);
    $this->db->delete('tb_pegawai');
    $this->db->where('id', $id_user);
    $this->db->delete('user');
    $this->session->set_flashdata('flash', ' Berhasil Dihapus');
    redirect('admin/pegawai');
  }

  public function akun_pegawai()
  {
    $data['title'] = 'Data Akun';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['akun'] = $this->Admin_model->getAllDetail();

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/akun/index', $data);
    $this->load->view('backend/template/footer');
  }

  public function reset_password($id)
  {
    $data = [
      'password' => password_hash('anggota', PASSWORD_DEFAULT),
    ];
    $this->db->where('id', $id);
    $this->db->update('user', $data);
    $this->session->set_flashdata('flash', 'Berhasil Direset');
    redirect('admin/akun-pegawai');
  }

  public function lembur_pegawai()
  {
    $data['title'] = 'Lembur Hari Ini';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pegawai'] = $this->Admin_model->getAllpegawai();
    $data['lemburbydate'] = $this->Admin_model->getAlllemburByDate();

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/lembur/lembur', $data);
    $this->load->view('backend/template/footer');
  }
  public function simpan_lembur_pegawai()
  {
    $data['title'] = 'Lembur Hari Ini';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $id_pegawai = $this->input->post('id_pegawai', true);
    $date = $this->input->post('date', true);
    $time = $this->input->post('time', true);
    $data = [
      "id_pegawai" => $id_pegawai,
      "date" => $date,
      "waktu_lembur" => $time,
    ];
    $this->db->insert('tb_lembur', $data);
    $this->session->set_flashdata('flash', 'Data Lembur Berhasil ditambah');
    redirect('admin/tambah-lembur');
  }
  public function edit_lembur_pegawai()
  {
    $data['title'] = 'Lembur Hari Ini';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $id_lembur = $this->input->post('id_lembur', true);
    $id_pegawai = $this->input->post('id_pegawai', true);
    $date = $this->input->post('date', true);
    $time = $this->input->post('time', true);
    $data = [
      "id_pegawai" => $id_pegawai,
      "date" => $date,
      "waktu_lembur" => $time,
    ];
    $this->db->where('id_lembur', $id_lembur);
    $this->db->update('tb_lembur', $data);
    $this->session->set_flashdata('flash', 'Data Lembur Berhasil ditambah');
    redirect('admin/tambah-lembur');
  }
  public function hapus_lembur_pegawai($id)
  {
    $this->db->where('id_lembur', $id);
    $this->db->delete('tb_lembur');
    $this->session->set_flashdata('flash', ' Berhasil Dihapus');
    redirect('admin/tambah-lembur');
  }


  public function tampil_konfirmasi()
  {
    $data['title'] = 'Tampil Konfirmasi';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['konfirmasi'] = $this->Admin_model->getAllKonfirmasiByDate();
    // var_dump($data['konfirmasi']);
    // die;

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/konfirmasi/index', $data);
    $this->load->view('backend/template/footer');
  }

  public function konfirmasi_absen($id)
  {
    $data['title'] = 'Lembur Hari Ini';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data = [
      "status" => 1,
    ];
    $this->db->where('id_presents', $id);
    $this->db->update('tb_presents', $data);
    $this->session->set_flashdata('flash', 'Absen Masuk Berhasil Dikonfirmasi');
    redirect('admin/tampil-konfirmasi');
  }

  public function konfirmasi_absen_pulang($id)
  {
    $data['title'] = 'Lembur Hari Ini';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data = [
      "status" => 2,
    ];
    $this->db->where('id_presents', $id);
    $this->db->update('tb_presents', $data);
    $this->session->set_flashdata('flash', 'Absen Pulang Berhasil Dikonfirmasi');
    redirect('admin/tampil-konfirmasi');
  }

  public function konfirmasi_absen_lembur($id, $id_peg)
  {
    $data['title'] = 'Lembur Hari Ini';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $lembur = $this->Admin_model->getPegawaiByLemburTanggal($id_peg);
    $id_lembur = $lembur['id_lembur'];
    // var_dump($id_lembur);
    // die;
    $data = [
      "status" => 3,
      "id_lembur" => $id_lembur,
    ];
    $this->db->where('id_presents', $id);
    $this->db->update('tb_presents', $data);
    $this->Admin_model->InsertTbLembur($id_peg);
    $this->session->set_flashdata('flash', 'Data Lembur Berhasil Dikonfirmasi');
    redirect('admin/tampil-konfirmasi');
  }

  public function konfirmasi_absen_izin_sakit($id)
  {

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data = [
      "status" => 4,
    ];
    $this->db->where('id_presents', $id);
    $this->db->update('tb_presents', $data);

    $this->session->set_flashdata('flash', 'Data Lembur Berhasil Dikonfirmasi');
    redirect('admin/tampil-konfirmasi');
  }
  public function konfirmasi_absen_izin_tdkmsk($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data = [
      "status" => 5,
    ];
    $this->db->where('id_presents', $id);
    $this->db->update('tb_presents', $data);
    $this->session->set_flashdata('flash', 'Data Lembur Berhasil Dikonfirmasi');
    redirect('admin/tampil-konfirmasi');
  }

  //data absen
  public function absen_bulanan()
  {
    $data['title'] = 'Absen Bulanan';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $thn = $this->input->post('th');
    $bln = $this->input->post('bln');
    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;
    $id_peg = $this->input->post('id_peg');
    // $data['petugas'] = $this->db->get_where('user')->result_array();
    // 
    $data['list_th'] = $this->Admin_model->getTahun();
    $data['list_bln'] = $this->Admin_model->getBln();
    $data['pegawai'] = $this->Admin_model->getAllpegawai();
    $isi = $this->Admin_model->getAllpegawaiByid($id_peg);
    if ($isi == null) {
      $data['detail_pegawai']['nama_pegawai'] = '';
      $data['detail_pegawai']['namjab'] = '';
    } else {
      $data['detail_pegawai'] = $isi;
    }


    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }
    // 
    $data['absen'] = $this->Admin_model->getAllAbsen($thnpilihan1, $thnpilihan2, $id_peg);

    $data['blnnya'] = $bln;
    $data['thn'] = $thn;


    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/absenbulanan/index', $data);
    $this->load->view('backend/template/footer');
  }

  public function cetak_absen_bulanan($thn, $bln, $idpeg)
  {

    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;

    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }
    // 
    $data['detail_pegawai'] = $this->Admin_model->getAllpegawaiByid($idpeg);
    $data['absen'] = $this->Admin_model->getAllAbsen($thnpilihan1, $thnpilihan2, $idpeg);

    $data['blnnya'] = $bln;
    $data['thn'] = $thn;
    // $this->load->view('backend/template/header', $data);
    $this->load->view('backend/admin/absenbulanan/cetak', $data);
  }

  public function detail_absen($id)
  {
    $data['title'] = 'Detail Absensi';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['detail_absensi'] = $this->Admin_model->getDetailAbsen($id);

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/absenbulanan/detail', $data);
    $this->load->view('backend/template/footer');
  }



  public function lembur_bulanan()
  {
    $data['title'] = 'Lembur Bulanan';
    // mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $thn = $this->input->post('th');
    $bln = $this->input->post('bln');
    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;

    // $data['petugas'] = $this->db->get_where('user')->result_array();
    // 
    $data['list_th'] = $this->Admin_model->getTahun();
    $data['list_bln'] = $this->Admin_model->getBln();

    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }
    // 
    // var_dump($thnpilihan1);
    // die;
    $data['absen'] = $this->Admin_model->getAllLemburPegawai($thnpilihan1, $thnpilihan2);
    // var_dump($data['absen']);
    // die;

    $data['blnnya'] = $bln;
    $data['thn'] = $thn;


    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/lemburbulanan/index', $data);
    $this->load->view('backend/template/footer');
  }
  public function cetak_absen_lembur($thn, $bln)
  {
    $data['title'] = 'Lembur Bulanan';
    // mengambil data user berdasarkan email yang ada di session

    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;

    // $data['petugas'] = $this->db->get_where('user')->result_array();
    // 


    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }
    // 
    $data['absen'] = $this->Admin_model->getAllLemburPegawai($thnpilihan1, $thnpilihan2);
    // var_dump($data['absen']);
    // die;

    $data['blnnya'] = $bln;
    $data['thn'] = $thn;
    $this->load->view('backend/admin/lemburbulanan/cetak', $data);
  }

  public function tpp_bulanan()
  {
    $data['title'] = 'Payrol Bulanan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $thn = $this->input->post('th');
    $bln = $this->input->post('bln');
    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;
    $data['pegawai'] = $this->Admin_model->getAllpegawai();


    $data['list_th'] = $this->Admin_model->getTahun();
    $data['list_bln'] = $this->Admin_model->getBln();
    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }
    // 
    $data['gaji'] = $this->Admin_model->getAllGajiByDate($thnpilihan1, $thnpilihan2);
    $data['blnnya'] = $bln;
    $data['thn'] = $thn;

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/tpp_bulanan/index', $data);
    $this->load->view('backend/template/footer');
  }
  public function akumulasi_gaji()
  {
    // $id_pegawai = $_POST['id_pegawai'];
    // var_dump($id_pegawai);
    // die;
    // echo 'success';
    // echo json_encode(['pesan' => 'berhasil']);
    // redirect('admin/tpp-bulanana');

    if ($_POST['id_pegawai'] != '' && $_POST['tahun_cari'] != '' && $_POST['bulan_cari'] != '') {

      $id_pegawai = $_POST['id_pegawai'];
      $thn = $_POST['tahun_cari'];
      $bln = $_POST['bulan_cari'];
      if ($bln < 10) {
        $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
        $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
      } else {
        $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
        $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
      }

      // jabatan
      $this->db->select('jabatan.*');
      $this->db->from('tb_pegawai');
      $this->db->join('jabatan', 'tb_pegawai.jabatan = jabatan.id_jabatan');
      $this->db->where('tb_pegawai.id_pegawai', $id_pegawai);
      $jabatan = $this->db->get()->row();
      // 

      // hitung jumglah masuk
      $this->db->where('id_pegawai', $id_pegawai);
      $this->db->where('keterangan', 2);
      $this->db->where('tanggal >=', $thnpilihan1);
      $this->db->where('tanggal <=', $thnpilihan2);
      $this->db->from('tb_presents');
      $total_msk = $this->db->count_all_results();

      // 
      // hitung jumglah lembur
      $this->db->where('id_pegawai', $id_pegawai);
      $this->db->where('keterangan', 3);
      $this->db->where('tanggal >=', $thnpilihan1);
      $this->db->where('tanggal <=', $thnpilihan2);
      $this->db->from('tb_presents');
      $total_lembur = $this->db->count_all_results();
      // 

      $total_msk_lembur = $jabatan->salary * $total_lembur;

      $total_gaji_masuk = $total_msk_lembur + ($total_msk * $jabatan->salary);
      $total_gaji_lembur = $total_lembur * $jabatan->overtime;
      if ($total_gaji_masuk !== 0) {
        $simpan = true;
      } else {
        $simpan = false;
      }
    }

    if ($simpan == TRUE) {

      echo json_encode(
        [
          'flash' => 'Data Ditemukan',
          'gaji_msk' => $total_gaji_masuk,
          'gaji_lembur' => $total_gaji_lembur,
        ],
      );
    } else {
      echo json_encode([
        'flash' => 'Gaji Bulan Ini Kosong',

      ]);
    }
  }
  public function simpan_gaji()
  {

    $id_pegawai = $this->input->post('id_pegawai', true);
    $thn = $this->input->post('th1', true);
    $bln = $this->input->post('bln1', true);
    $gapok = $this->input->post('gapok', true);
    $lembur = $this->input->post('lembur', true);
    $bonus = $this->input->post('bonus', true);
    $keterangan = $this->input->post('keterangan', true);

    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }

    $gaji = $this->Admin_model->getAllGajiByDateID($thnpilihan1, $thnpilihan2, $id_pegawai);
    if ($gaji != null) {
      $this->session->set_flashdata('flash', 'Data Gaji Pegawai Pada Bulan Ini Sudah Ditambahkan');
      redirect('admin/tpp-bulanan');
    } else {

      if ($bonus == null) {
        $bonus = 0;
      }
      $gaji_bersih = $gapok + $lembur + $bonus;
      if ($bln < 10) {
        $periode = $thn . '-' . '0' . $bln . '-' . '31';
      } else {
        $periode = $thn . '-' . $bln . '-' . '31';
      }
      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date('Y-m-d');

      $pegawai = $this->Admin_model->getDetailpegawai($id_pegawai);

      $data = [
        "id_pegawai" => $id_pegawai,
        "periode" => $periode,
        "tanggal" => $tanggal_upload,
        "id_jabatan" => $pegawai['jabatan'],
        "gaji_pokok" => $gapok,
        "gaji_lembur" => $lembur,
        "bonus" => $bonus,
        "keterangan" => $keterangan,
        "gaji_bersih" => $gaji_bersih,
      ];
      $this->db->insert('tb_payrol', $data);
      $this->session->set_flashdata('flash', 'Data Payrol Pegawai Berhasil Ditambah');

      redirect('admin/tpp-bulanan', $data);
    }
  }


  public function edit_gaji()
  {

    $bonus = $this->input->post('bonus', true);
    $keterangan = $this->input->post('keterangan', true);
    $id_payrol = $this->input->post('id_payrol', true);
    $gaber = $this->input->post('gaber', true);

    $gaji_bersih = $gaber + $bonus;

    $data = [
      "bonus" => $bonus,
      "keterangan" => $keterangan,
      "gaji_bersih" => $gaji_bersih,
    ];
    $this->db->where('id_payrol', $id_payrol);
    $this->db->update('tb_payrol', $data);
    $this->session->set_flashdata('flash', 'Data Payrol Pegawai Berhasil Diperbarui');
    redirect('admin/tpp-bulanan', $data);
  }

  public function hapus_gaji($id)
  {
    $this->db->where('id_payrol', $id);
    $this->db->delete('tb_payrol');
    $this->session->set_flashdata('flash', ' Berhasil Dihapus');
    redirect('admin/tpp-bulanan');
  }

  public function laporan_tpp_bulanan()
  {
    $data['title'] = 'Cetak Payrol Bulanan';

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $thn = $this->input->post('th');
    $bln = $this->input->post('bln');
    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;
    $data['pegawai'] = $this->Admin_model->getAllpegawai();


    $data['list_th'] = $this->Admin_model->getTahun();
    $data['list_bln'] = $this->Admin_model->getBln();

    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }
    // 
    $data['gaji'] = $this->Admin_model->getAllGajiByDate($thnpilihan1, $thnpilihan2);
    $data['blnnya'] = $bln;
    $data['thn'] = $thn;

    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/laporan/laporan_tpp', $data);
    $this->load->view('backend/template/footer');
  }

  public function detail_laporan_tpp_bulanan($id_pegawai, $bln, $thn)
  {
    $data['title'] = 'detail Laporan Payrol Bulanan';

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['pegawai'] = $this->Admin_model->getAllpegawai();
    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;
    $data['id_pegawai'] = $id_pegawai;

    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }


    // var_dump($thnpilihan2);
    // die;
    // 
    $data['gaji'] = $this->Admin_model->getAllGajiByDateID($thnpilihan1, $thnpilihan2, $id_pegawai);
    $data['absen'] = $this->Admin_model->getAllLemburPegawaiById($thnpilihan1, $thnpilihan2, $id_pegawai);
    // var_dump($data['gaji']);
    // die;


    $this->load->view('backend/template/header', $data);
    $this->load->view('backend/template/topbar', $data);
    $this->load->view('backend/template/sidebar', $data);
    $this->load->view('backend/admin/laporan/detail_laporan_tpp', $data);
    $this->load->view('backend/template/footer');
  }
  public function cetak_payrol_pegawai($id_pegawai, $bln, $thn)
  {
    $data['title'] = 'Lembur Bulanan';
    // mengambil data user berdasarkan email yang ada di session

    $data['blnselected'] = $bln;
    $data['thnselected'] = $thn;

    // $data['petugas'] = $this->db->get_where('user')->result_array();
    // 


    if ($bln < 10) {
      $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
    } else {
      $thnpilihan1 = $thn . '-' . $bln . '-' . '01';
      $thnpilihan2 = $thn . '-' . $bln . '-' . '31';
    }
    // 
    $data['gaji'] = $this->Admin_model->getAllGajiByDateID($thnpilihan1, $thnpilihan2, $id_pegawai);
    $data['absen'] = $this->Admin_model->getAllLemburPegawaiById($thnpilihan1, $thnpilihan2, $id_pegawai);
    // var_dump($data['absen']);
    // die;

    $data['blnnya'] = $bln;
    $data['thn'] = $thn;
    $this->load->view('backend/admin/laporan/cetak', $data);
  }
}
