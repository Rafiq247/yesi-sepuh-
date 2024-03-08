 <!--Main Content-->

 <div class="row main-content">
   <!--Sidebar left-->
   <div class="col-sm-3 col-xs-6 sidebar pl-0">
     <div class="inner-sidebar mr-3">
       <!--Image Avatar-->
       <div class="avatar text-center">
         <img src="<?php echo base_url() . '/gambar/' . $user['image']; ?>" alt="" class="rounded-circle" />
         <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span> -->
         <p><strong><?= $user['name']; ?></strong></p>
         <span class="text-primary small"><strong>Selamat Datang</strong></span>
       </div>

       <!--Sidebar Navigation Menu-->
       <div class="sidebar-menu-container">
         <ul class="sidebar-menu mt-4 mb-4">
           <li class="parent">
             <a href="<?= base_url() ?>admin/dashboard" class=""><i class="fa fa-dashboard mr-3"> </i>
               <span class="none">Dashboard </span>
             </a>
           </li>
           <li class="parent">
             <a href="" onclick="toggle_menu('tentang'); return false" class=""><i class="fa fa-book mr-3"> </i>
               <span class="none">Tentang<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="tentang">
               <li class="child"><a href="<?= base_url() ?>admin/visi_misi" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Visi & Misi</a></li>
               <li class="child"><a href="<?= base_url() ?>admin/sejarah" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Sejarah Perusahaan</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="" onclick="toggle_menu('datamaster'); return false" class=""><i class="fa fa-book mr-3"> </i>
               <span class="none">Data Master<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="datamaster">
               <li class="child"><a href="<?= base_url() ?>admin/jabatan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Data Jabatan</a></li>
               <li class="child"><a href="<?= base_url() ?>admin/pegawai" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Data Pegawai</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="" onclick="toggle_menu('datalembur'); return false" class=""><i class="fa  fa-calendar mr-3"> </i>
               <span class="none">Data Lembur<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="datalembur">
               <li class="child"><a href="<?= base_url() ?>admin/tambah-lembur" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Lembur Hari Ini</a></li>

             </ul>
           </li>

           <li class="parent">
             <a href="#" onclick="toggle_menu('absensi'); return false" class=""><i class="fa fa-bookmark mr-3"> </i>
               <span class="none">Konfirmasi Absensi<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="absensi">
               <li class="child"><a href="<?= base_url() ?>admin/tampil-konfirmasi" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Konfirmasi Absen</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="#" onclick="toggle_menu('tunjangan'); return false" class=""><i class="fa fa-credit-card mr-3"> </i>
               <span class="none">Tunjangan Pegawai<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="tunjangan">
               <li class="child"><a href="<?= base_url() ?>admin/tpp-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>TPP</a></li>

             </ul>
           </li>
           <li class="parent">
             <a href="#" onclick="toggle_menu('akun'); return false" class=""><i class="fas fa-user-circle mr-3"> </i>
               <span class="none">Data Akun<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="akun">
               <li class="child"><a href="<?= base_url() ?>admin/akun-pegawai" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Akun Pegawai</a></li>
             </ul>
           </li>

           <li class="parent">
             <a href="#" onclick="toggle_menu('laporan'); return false" class=""><i class="fa fa-file-powerpoint mr-3"> </i>
               <span class="none">Laporan<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="laporan">
               <li class="child"><a href="<?= base_url() ?>admin/lembur-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Data Absen Bulanan</a></li>
               <li class="child"><a href="<?= base_url() ?>admin/absen-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Detail Absen Bulanan</a></li>
               <li class="child"><a href="<?= base_url() ?>admin/laporan-tpp-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Data TPP</a></li>

             </ul>
           </li>


         </ul>
       </div>

       <!--Sidebar Naigation Menu-->
     </div>
   </div>
   <!--Sidebar left-->