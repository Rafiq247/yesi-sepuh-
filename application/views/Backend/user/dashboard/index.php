 <!--Content right-->
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
   <h5 class="mb-3"><strong>Dashboard</strong></h5>

   <!--Dashboard widget-->
   <?php if ($this->session->flashdata('flash')) : ?>
     <div class="alert alert-info alert-dismissible fade show" role="alert">
       <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
       <?= $this->session->unset_userdata('flash'); ?>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
   <?php endif ?>
   <div class="mt-1 mb-3 button-container">
     <div class="alert alert-primary" role="alert">
       <div class="row align-items-center">
         <div class="col-lg-8">
           <p>Selamat Datang, <b><?= $user['name'] ?></b></p>
         </div>
         <div class="col-lg-1" style="left: 45px;">
           <button class="btn" style="background: #B0C4DE   ;" data-toggle="modal" data-target=".myModal"> Ubah Profil</button>
         </div>
         <div class="col-lg-1" style="left: 80px;">
           <button class="btn" style="background: #B0C4DE   ;" data-toggle="modal" data-target=".myModalpassword"> Ubah Password</button>
         </div>
       </div>
     </div>
     <div class="mt-1 mb-3 button-container">
       <div class="row pl-0">
         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-success">
             <p class="pw-2 text-center text-white">
               <i class="fa fa-users"></i>
             </p>
             <p class="mt-2 text-white text-center">Data Anda <br> </p>

           </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-danger">
             <p class="pw-2 text-center text-white">
               <i class="fa fa-bookmark"></i>

             </p>
             <p class="mt-2 text-white text-center">Konfirmasi Absen<br> <small class="bc-description text-white"></small></p>
           </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-primary">
             <p class="pw-2 text-center text-white">
               <i class="fa fa-file-powerpoint"></i>

             </p>
             <p class="mt-2 text-white text-center">Absensi Bulanan Anda<br> </p>
           </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
           <div class="border shadow p-3 bg-warning">
             <p class="pw-2 text-center text-white">
               <i class="fa fa-credit-card"></i>
             </p>
             <p class="mt-2 text-white text-center">Cek Gaji & Bonus Bulanan<br></p>
           </div>
         </div>

       </div>
     </div>
   </div>
   <!--/Dashboard widget-->


   <div class="mt-1 mb-5 button-container">
     <div class="card shadow-sm">
       <div class="card-header  bg-primary">
         <h6 class="text-white">Konfirmasi Absen Hari Ini</h6>
       </div>
       <div class="card-body">
         <div class="table-responsive">
           <table id="example" class="table table-striped table-bordered">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Tanggal</th>
                 <th>Waktu</th>
                 <th>Keterangan</th>
                 <th>Status</th>
               </tr>
             </thead>
             <tbody>
               <?php $no = 1; ?>
               <?php
                foreach ($konfirmasi_absen as $b) : ?>
                 <tr>
                   <td><?= $no++ ?></td>
                   <td><?= $b['tanggal']; ?></td>
                   <td><?= $b['waktu']; ?></td>
                   <td>
                     <?php if ($b['keterangan'] == 0) : ?>
                       Alfa
                     <?php elseif ($b['keterangan'] == 1) : ?>
                       <span class="badge badge-success">Masuk</span>
                     <?php elseif ($b['keterangan'] == 2) : ?>
                       <span class="badge badge-success">Pulang</span>
                     <?php elseif ($b['keterangan'] == 3) : ?>
                       <span class="badge badge-success">Lembur</span>
                     <?php elseif ($b['keterangan'] == 4) : ?>
                       <span class="badge badge-success">Izin Sakit</span>
                     <?php elseif ($b['keterangan'] == 5) : ?>
                       <h5><span class="badge badge-success">Izin Tidak Masuk</span></h5>
                     <?php endif ?>

                   </td>
                   <td>
                     <?php if ($b['keterangan'] == 1 && $b['status'] == 0) : ?>
                       <span class="badge badge-danger">Belum dikonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 1 && $b['status'] == 1) : ?>
                       <span class="badge badge-primary">Terkonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 2 && $b['status'] == 1) : ?>
                       <span class="badge badge-danger">Belum dikonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 2 && $b['status'] == 2) : ?>
                       <span class="badge badge-primary">Terkonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 3 && $b['status'] != 3) : ?>
                       <span class="badge badge-danger">Belum dikonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 3 && $b['status'] == 3) : ?>
                       <span class="badge badge-primary">Terkonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 4 && $b['status'] <= 3) : ?>
                       <span class="badge badge-danger">Belum dikonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 4 && $b['status'] <= 4) : ?>
                       <span class="badge badge-primary">Terkonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 5 && $b['status'] <= 4) : ?>
                       <span class="badge badge-danger">Belum dikonfirmasi</span>
                     <?php elseif ($b['keterangan'] == 5 && $b['status'] <= 5) : ?>
                       <span class="badge badge-primary">Terkonfirmasi</span>
                     <?php else : ?>
                       ayam
                     <?php endif ?>

                   </td>
                 </tr>
               <?php endforeach ?>
             </tbody>

           </table>
         </div>
       </div>
     </div>
   </div>


   <!-- <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> -->
   <div class="modal fade myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header text-center">
           <h5 class="modal-title text-secondary"><strong>Edit Profil</strong></h5>
           <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body text-justify">
           <form class="form-horizontal" action="<?php echo base_url() . 'pegawai/edit-profil' ?>/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
             <div class="modal-body">
               <div class="form-group">
                 <label class="col-sm-12">Email</label>
                 <div class="col-sm-12">
                   <input type="text" name="email" class="form-control " value="<?= $user['email'] ?>" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-12">Nama</label>
                 <div class="col-sm-12">
                   <input type="text" name="nama" class="form-control" value="<?= $user['name'] ?>">
                 </div>
               </div>
               <div class="form-group">
                 <div class="row">
                   <label class="col-sm-1 ml-3">Photo</label>
                   <div class="col-sm-2 ml-3">
                     <img src="<?php echo base_url() . '/gambar/pegawai/' . $user['image']; ?>" class="card-img mx-auto d-block" style="width: 120px; height: 140px;">
                   </div>
                   <div class="col-sm-6 ml-5">
                     <input type="file" name="userfilefoto" class="form-control" id="userfilefoto">
                   </div>
                 </div>
               </div>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>

             </div>
           </form>
         </div>

       </div>
     </div>
   </div>

   <div class="modal fade myModalpassword" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header text-center">
           <h5 class="modal-title text-secondary"><strong>Perbarui Password</strong></h5>
           <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body text-justify">

           <form class="form-horizontal" action="<?php echo base_url() . 'pegawai/edit-password' ?>/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
             <div class="modal-body">
               <div class="form-group">
                 <label class="col-sm-12">Password Lama</label>
                 <div class="col-sm-12">
                   <input type="text" name="password_lama" class="form-control ">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-12">Password Baru</label>
                 <div class="col-sm-12">
                   <input type="text" name="password_baru" class="form-control">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-12">Konfirmasi Password</label>
                 <div class="col-sm-12">
                   <input type="text" name="password_baru1" class="form-control">
                 </div>
               </div>

             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>

             </div>
           </form>
         </div>

       </div>
     </div>
   </div>