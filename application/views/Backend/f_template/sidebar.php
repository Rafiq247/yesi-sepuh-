 <!--Main Content-->

 <div class="row main-content">
   <!--Sidebar left-->
   <div class="col-sm-3 col-xs-6 sidebar pl-0">
     <div class="inner-sidebar mr-3">
       <!--Image Avatar-->
       <div class="avatar text-center">
         <img src="<?php echo base_url() . '/gambar/pegawai/' . $user['image']; ?>" alt="" class="rounded-circle" />
         <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span> -->
         <p><strong><?= $user['name']; ?></strong></p>
         <span class="text-primary small"><strong>Selamat Datang</strong></span>
       </div>

       <!--Sidebar Navigation Menu-->
       <div class="sidebar-menu-container">
         <ul class="sidebar-menu mt-4 mb-4">
           <li class="parent">
             <a href="<?= base_url() ?>pegawai" class=""><i class="fa fa-dashboard mr-3"> </i>
               <span class="none">Dashboard </span>
             </a>
           </li>
           <li class="parent">
             <a href="" onclick="toggle_menu('tentang'); return false" class=""><i class="fa fa-book mr-3"> </i>
               <span class="none">Tentang<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="tentang">
               <li class="child"><a href="<?= base_url() ?>pegawai/visi_misi" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Visi & Misi</a></li>
               <li class="child"><a href="<?= base_url() ?>pegawai/sejarah" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Sejarah Perusahaan</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="#" onclick="toggle_menu('absensi'); return false" class=""><i class="fa fa-bookmark mr-3"> </i>
               <span class="none">Data Absensi<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="absensi">
               <li class="child"><a href="<?= base_url() ?>pegawai/absen-harian" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Ambil Absen</a></li>
               <li class="child"><a href="<?= base_url() ?>pegawai/konfirmasi-absen" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Konfirmasi Absen</a></li>
               <li class="child"><a href="<?= base_url() ?>pegawai/absen-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Data Bulanan</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="#" onclick="toggle_menu('tunjangan'); return false" class=""><i class="fa  fa-credit-card mr-3"> </i>
               <span class="none">Gaji & Bonus<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="tunjangan">
               <li class="child"><a href="<?= base_url() ?>pegawai/laporan-tpp-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>TPP</a></li>

             </ul>
           </li>
           <li class="parent">
             <a href="<?= base_url() ?>auth/logout" class=""><i class="fa fa-dashboard mr-3"> </i>
               <span class="none">Logout </span>
             </a>
           </li>
         </ul>
       </div>

       <!--Sidebar Naigation Menu-->
     </div>
   </div>
   <!--Sidebar left-->