    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    /*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method

*/




    // backend riri
    // halaman login
    // $route['Login'] = 'auth/index';
    // dashboard
    $route['admin/dashboard'] = 'admin/index';
    // jabatan
    $route['admin/jabatan'] = 'admin/jabatan';
    $route['admin/tambah-jabatan'] = 'admin/tambah_jabatan';
    $route['admin/hapus-jabatan/(:any)'] = 'admin/hapus_jabatan/$1';
    $route['admin/edit-jabatan'] = 'admin/edit_jabatan';
    // Pegawai
    $route['admin/pegawai'] = 'admin/pegawai';
    $route['admin/tambah-pegawai'] = 'admin/tambah_pegawai';
    $route['admin/export'] = 'admin::export';
    $route['admin/edit-pegawai'] = 'admin/edit_pegawai';
    $route['admin/hapus-pegawai/(:any)/(:any)'] = 'admin/hapus_pegawai/$1/$2';
    $route['admin/detail-pegawai/(:any)'] = 'admin/detail_pegawai/$1';
    //akun
    $route['admin/akun-pegawai'] = 'admin/akun_pegawai';
    $route['admin/reset-password/(:any)'] = 'admin/reset_password/$1';
    //lembur pegawai

    $route['admin/tampil-konfirmasi'] = 'admin/tampil_konfirmasi';
    $route['admin/konfirmasi-absen/(:any)'] = 'admin/konfirmasi_absen/$1';
    $route['admin/konfirmasi-absen-pulang/(:any)'] = 'admin/konfirmasi_absen_pulang/$1';
    $route['admin/konfirmasi-absen-lembur/(:any)/(:any)'] = 'admin/konfirmasi_absen_lembur/$1/$2';
    $route['admin/konfirmasi-absen-izinsakit/(:any)'] = 'admin/konfirmasi_absen_izin_sakit/$1';
    $route['admin/konfirmasi-absen-izin-tidak-masuk/(:any)'] = 'admin/konfirmasi_absen_izin_tdkmsk/$1';



    $route['admin/tambah-lembur'] = 'admin/lembur_pegawai';
    $route['admin/simpan-lembur'] = 'admin/simpan_lembur_pegawai';
    $route['admin/edit-lembur'] = 'admin/edit_lembur_pegawai';
    $route['admin/hapus-lembur/(:any)'] = 'admin/hapus_lembur_pegawai/$1';
    $route['admin/tambah-lembur'] = 'admin/lembur_pegawai';



    $route['admin/absen-bulanan'] = 'admin/absen_bulanan';
    $route['admin/cetak-absen-bulanan/(:any)/(:any)/(:any)'] = 'admin/cetak_absen_bulanan/$1/$2/$3';
    $route['admin/detail-absen/(:any)'] = 'admin/detail_absen/$1';


    // lembur bulanan
    $route['admin/lembur-bulanan'] = 'admin/lembur_bulanan';
    $route['admin/cetak-absen-lembur/(:any)/(:any)'] = 'admin/cetak_absen_lembur/$1/$2';
    // TPP GAJI
    $route['admin/tpp-bulanan'] = 'admin/tpp_bulanan';
    $route['admin/laporan-tpp-bulanan'] = 'admin/laporan_tpp_bulanan';
    $route['admin/detail-laporan-tpp/(:any)/(:any)/(:any)'] = 'admin/detail_laporan_tpp_bulanan/$1/$2/$3';
    $route['admin/cetak-payrol-pegawai/(:any)/(:any)/(:any)'] = 'admin/cetak_payrol_pegawai/$1/$2/$3';


    $route['admin/akumulasi-gaji'] = 'admin/akumulasi_gaji';
    $route['admin/simpan-gaji'] = 'admin/simpan_gaji';
    $route['admin/edit-gaji'] = 'admin/edit_gaji';
    $route['admin/hapus-gaji/(:any)'] = 'admin/hapus_gaji/$1';
    // $route['admin/cetak-absen-lembur/(:any)/(:any)'] = 'admin/cetak_absen_lembur/$1/$2';

    // $route['admin/detail-absen/(:any)'] = 'admin/detail_absen/$1';


    // Pegwai
    $route['pegawai/edit-profil/(:any)'] = 'pegawai/edit_profil/$1';
    $route['pegawai/edit-password/(:any)'] = 'pegawai/edit_password/$1';
    $route['pegawai/absen-harian'] = 'pegawai/absen_harian';
    $route['pegawai/ambilabsen'] = 'pegawai/ambil_absen';
    $route['pegawai/ambilabsen-pulang'] = 'pegawai/ambil_absen_pulang';
    $route['pegawai/ambilabsen-lembur'] = 'pegawai/ambil_absen_lembur';
    $route['pegawai/cuti-pegawai'] = 'pegawai/cuti_pegawai';
    $route['pegawai/konfirmasi-absen'] = 'pegawai/konfirmasi_absen';
    $route['pegawai/absen-bulanan'] = 'pegawai/absen_bulanan';
    $route['pegawai/detail-absen/(:any)'] = 'pegawai/detail_absen/$1';
    $route['pegawai/laporan-tpp-bulanan'] = 'pegawai/laporan_tpp_bulanan';
    $route['pegawai/detail-laporan-tpp/(:any)/(:any)/(:any)'] = 'pegawai/detail_laporan_tpp_bulanan/$1/$2/$3';
    $route['pegawai/cetak-payrol-pegawai/(:any)/(:any)/(:any)'] = 'pegawai/cetak_payrol_pegawai/$1/$2/$3';

    // febby

    $route['default_controller'] = 'auth';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;
