 <!--Content right-->
 <!--Content right-->
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

 <?php
  function nmbulan($angka)
  {
    switch ($angka) {
      case 1:
        return "Januari";
        break;
      case 2:
        return "Februari";
        break;
      case 3:
        return "Maret";
        break;
      case 4:
        return "April";
        break;
      case 5:
        return "Mei";
        break;
      case 6:
        return "Juni";
        break;
      case 7:
        return "Juli";
        break;
      case 8:
        return "Agustus";
        break;
      case 9:
        return "September";
        break;
      case 10:
        return "Oktober";
        break;
      case 11:
        return "November";
        break;
      case 12:
        return "Desember";
        break;
    }
  }
  ?>

 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
   <?php if ($this->session->flashdata('flash')) : ?>
     <div class="alert alert-info alert-dismissible fade show" role="alert">
       <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
       <?= $this->session->unset_userdata('flash'); ?>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
   <?php endif ?>
   <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">

     <div class="row">
       <div class="col-md-12">

         <div class="row border-bottom mb-4">
           <div class="col-sm-8 pt-2">
             <h6 class="mb-4 bc-header"><?= $title ?></h6>
           </div>

         </div>
         <div class="text-center mb-3">

           <h3 class="mb-0"><b>DATA PAYROL PEGAWAI</b></h3>

           <hr>

         </div>
         <!-- PENCARIAN BERDASARKAN BULAN DAN TAHUN-->
         <form action="<?= base_url() ?>pegawai/laporan-tpp-bulanan" method="post">
           <div class="row ">

             <div class="col-lg-3">

               <select name="th" id="th" class="form-control">
                 <option value="">- PILIH TAHUN -</option>
                 <?php
                  foreach ($list_th as $t) {
                    if ($thn == $t['th']) {
                  ?>
                     <option selected value="<?php echo $t['th'];  ?>"><?php echo $t['th']; ?></option>
                   <?php
                    } else {
                    ?>
                     <option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
                 <?php
                    }
                  }
                  ?>
               </select>
             </div>
             <div class="col-lg-3">

               <select name="bln" id="bln" class="form-control ">
                 <option value="">- PILIH BULAN -</option>
                 <?php
                  foreach ($list_bln as $t) {
                    if ($blnnya == $t['bln']) {
                  ?>
                     <option selected value="<?php $t['bln'];  ?>"><?php echo nmbulan($t['bln']); ?></option>
                   <?php
                    } else {
                    ?>
                     <option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
                 <?php
                    }
                  }
                  ?>
               </select>
             </div>
             <div class="col-lg-3">
               &nbsp;
               <?php if ($gaji == null) : ?>
                 <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i>Cari</button>
               <?php else : ?>
                 <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i>Refresh</button>
               <?php endif ?>
               &nbsp;


             </div>
             <!--  -->
           </div>
         </form>

         <div class="table-responsive">
           <table id="example" class="table table-striped table-bordered">
             <thead>
               <tr>

                 <th>NAMA KARYAWAN</th>
                 <th>JABATAN</th>
                 <th>GAJI POKOK</th>
                 <th>LEMBUR</th>
                 <th>BONUS</th>
                 <th>KETERANGAN</th>
                 <th>GAJI BERSIH</th>
                 <th width=60>AKSI</th>
               </tr>
             </thead>
             <tbody>


               <tr>

                 <td><?= $gaji['nama_pegawai']; ?></td>
                 <td><?= $gaji['namjab']; ?></td>
                 <td><?= $gaji['gaji_pokok']; ?></td>
                 <td><?= $gaji['gaji_lembur']; ?></td>
                 <td><?= $gaji['bonus']; ?></td>
                 <td><?= $gaji['keterangan']; ?></td>
                 <td><?= $gaji['gaji_bersih']; ?></td>
                 <td width="20px">
                   <?php if ($gaji['gaji_bersih'] != '') : ?>
                     <div class="row">
                       <a href="<?= base_url('pegawai/detail-laporan-tpp') ?>/<?= $gaji['id_pegawai']; ?>/<?= $blnselected; ?>/<?= $thnselected; ?>" class="ml-3 mb-0">
                         <button type="button" class="btn btn-theme">
                           <i class="fa fa-eye"></i>
                         </button>
                       </a>
                       <hr>
                       <a target="_blank" href="<?= base_url(); ?>pegawai/cetak-payrol-pegawai/<?= $gaji['id_pegawai']; ?>/<?php echo $blnnya  ?>/<?php echo $thn  ?>" class="ml-0">
                         <button type="button" class="btn btn-danger">
                           <i class="fa fa-print"></i>
                         </button>
                       </a>
                     </div>
                   <?php endif ?>
                 </td>

               </tr>

             </tbody>

           </table>
         </div>
       </div>
     </div>