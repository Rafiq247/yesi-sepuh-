<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login';
      $this->load->view('backend/template/Auth_header', $data);
      $this->load->view('backend/auth/login');
      $this->load->view('backend/template/Auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      //kondisi jika user aktif 
      if ($user['is_active'] == 1) {
        //cek password 
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            $this->session->set_userdata('masuk_admin', true);
            redirect('admin');
          } else {
            $this->session->set_userdata('masuk_user', true);
            redirect('pegawai');
          }
        } else {
          $this->session->set_flashdata('message', 'password salah');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				email belum diaktivasi
		 		 </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			email tidak terdaftar
		 	 </div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email ini sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'Password tidak sama!',
      'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Registration';
      $this->load->view('backend/template/Auth_header', $data);
      $this->load->view('backend/auth/registration');
      $this->load->view('backend/template/Auth_footer');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];

      $data['user'] = $this->Auth_model->getAuthRegister();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Selamat! akunmu telah berhasil dibuat</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->sess_destroy();

    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    // anda berhasil logout
    //   </div>');

    $this->session->set_flashdata('message', 'anda berhasil logout');
    redirect('auth');
  }
}
