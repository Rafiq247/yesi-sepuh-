 <!--Content right-->
 <!--Content right-->
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

 <?php
  function rupiah($angka)
  {

    $hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.') . "-,";
    return $hasil_rupiah;
  }
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
           <div class="col-sm-4 text-right pb-3">
             <a target="_blank" href="<?= base_url(); ?>pegawai/cetak-payrol-pegawai/<?= $id_pegawai; ?>/<?php echo $blnselected  ?>/<?php echo $thnselected  ?>" class="ml-0">
               <button type="button" class="btn btn-danger">
                 <i class="fa fa-print"></i>
               </button>
             </a>

           </div>
         </div>
         <div class="text-center mb-3">
           <h3 class="mb-0"><b>LAPORAN PAYROL PEGAWAI</b></h3>
           <h5 class="mb-0"><b>PT.PESONA MAJOLELO PROPERTY</b></h5>

           <hr>
         </div>
         <!-- ISI -->
         <table class="table table-bordered table-striped table-sm mb-0">
           <tr height="40px">
             <td colspan=11 class="align-middle">
               <b>
                 <h6><b><u>DATA PEGAWAI :</u></b></h6>
               </b>
             </td>
           </tr>
           <tr>
             <td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;NO PEGAWAI</b></td>
             <td colspan=4><b><?= strtoupper($gaji['id_pegawai']) ?></b></td>
           </tr>
           <tr>
             <td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;NAMA PEGAWAI</b></td>
             <td colspan=4><b><?= strtoupper($gaji['nama_pegawai']) ?></b></td>
           <tr>
             <td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;PERIODE</b></td>
             <td colspan=4> <b><?= nmbulan(substr($gaji['periode'], 5, 2)) ?></b></td>
           </tr>
           <tr>
             <td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;JABATAN</b>
             <td colspan=4><b><?= strtoupper($gaji['namjab']) ?></b></td>
           </tr>
           <tr height="40px">
             <td colspan=11 class="align-middle">
               <b>
                 <h6><b><u>PENERIMAAN :</u></b></h6>
               </b>
             </td>
           </tr>

           <tr>
             <th width=44 scope=col class="text-center">1</th>
             <th width=300 scope=col>Gaji Pokok </th>
             <th width=508 scope=col colspan="5"><?= rupiah($gaji['gaji_pokok']) ?></th>
           </tr>
           <tr>
             <th width=44 scope=col class="text-center">2</th>
             <th width=300 scope=col>Upah Lembur </th>
             <th width=508 scope=col colspan="5"><?= rupiah($gaji['gaji_lembur']) ?></th>
           </tr>
           <tr>
             <th width=44 scope=col class="text-center">3</th>
             <th width=300 scope=col>Bonus</th>
             <th width=508 scope=col colspan="5"><?= rupiah($gaji['bonus']) ?></th>
           </tr>
           <tr height="50px">
             <td colspan=10 class="align-middle">
               <center>
                 <h5 class="align-middle"><b>total gaji bersih anda : <?= rupiah($gaji['gaji_bersih']) ?> </b></h5>
               </center>
             </td>
           </tr>
           <tr height="40px">
             <td colspan=11><b>
               </b>
             </td>
           </tr>

           <tr>
             <td colspan=4 align='center'><b>KETERANGAN</b></td>
             <td colspan=2 align='center' colspan="3"><b> ABSENSI/KEHADIRAN</b></td>
           </tr>
           <tr>
             <td colspan=4 rowspan="4" align='center' class="align-middle"><b><?= strtoupper($gaji['keterangan']) ?></b></td>
             <td align='center' colspan="3"><b> Masuk : <?= $absen['masuk'] ?></b></td>
           </tr>
           <tr>

             <td align='center' colspan="3"><b> Lembur : <?= $absen['jumlem'] ?></b></td>
           </tr>
           <tr>
             <td align='center' colspan="3"><b> Izin Sakit : <?= $absen['sakit'] ?></b></td>
           </tr>
           <tr>

             <td align='center' colspan="3"><b> Izin Tidak Masuk : <?= $absen['izin'] ?></b></td>
           </tr>


         </table><br>
       </div>
     </div>