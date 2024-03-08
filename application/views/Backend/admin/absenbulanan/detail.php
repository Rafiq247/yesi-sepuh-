 <!--Content right-->

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

   <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">

     <section class="content">
       <table class="table table-bordered table-hover table-striped table-sm mb-0">
         <thead>
           <tr>
             <th width="">Nama</th>
             <td><?php echo $detail_absensi['nama_pegawai'] ?></td>
           </tr>
           <tr>
             <th>Jabatan</th>
             <td><?php echo $detail_absensi['namjab'] ?></td>
           </tr>

           <tr>
             <th>Tanggal dan Waktu</th>
             <td><?php echo $detail_absensi['tanggal'] ?> / <?php echo $detail_absensi['waktu'] ?></td>
           </tr>
           <tr>
             <th>Jenis Absen</th>
             <td>
               <?php if ($detail_absensi['keterangan'] == 0) : ?>
                 <span class="badge badge-success">Alfa</span>
               <?php elseif ($detail_absensi['keterangan'] == 1) : ?>
                 <span class="badge badge-success">Masuk</span>
               <?php elseif ($detail_absensi['keterangan'] == 2) : ?>
                 <span class="badge badge-success">Pulang</span>
               <?php elseif ($detail_absensi['keterangan'] == 3) : ?>
                 <span class="badge badge-success">Lembur</span>
               <?php elseif ($detail_absensi['keterangan'] == 4) : ?>
                 <span class="badge badge-success">Izin Sakit</span>
               <?php elseif ($detail_absensi['keterangan'] == 5) : ?>
                 <span class="badge badge-success">Izin Tidak Masuk</span>
               <?php endif ?>
             </td>
           </tr>
           <?php if ($detail_absensi['keterangan'] == 4) : ?>
             <tr>
               <th>Surat Keterangan Dokter</th>
               <td>
                 <div class="">
                   <a href="<?= base_url('gambar/absensi/suratdokter/' . $detail_absensi['foto_selfie_masuk']) ?>" target="_blank">
                     <img src="<?php echo base_url() . '/gambar/absensi/suratdokter/' . $detail_absensi['foto_selfie_masuk']; ?>" class="card-img mx-auto d-block" style="width: 136px; height: 140px;">
                   </a>
                 </div>
               </td>
             </tr>
           <?php endif ?>
           <?php if ($detail_absensi['keterangan'] == 2) : ?>
             <tr>
               <th>Absen Masuk</th>
               <td>
                 <div class="">
                   <a href="<?= base_url('gambar/absensi/' . $detail_absensi['foto_selfie_masuk']) ?>" target="_blank">
                     <img src="<?php echo base_url() . '/gambar/absensi/' . $detail_absensi['foto_selfie_masuk']; ?>" class="card-img mx-auto d-block" style="width: 136px; height: 140px;">
                   </a>
                 </div>
               </td>
             </tr>

             <tr>
               <th>Absen Pulang</th>
               <td>
                 <div class="">
                   <a href="<?= base_url('gambar/absensi/' . $detail_absensi['foto_selfie_pulang']) ?>" target="_blank">
                     <img src="<?php echo base_url() . '/gambar/absensi/' . $detail_absensi['foto_selfie_pulang']; ?>" class="card-img mx-auto d-block" style="width: 136px; height: 140px;">
                   </a>
                 </div>
               </td>
             </tr>
           <?php endif ?>
           <?php if ($detail_absensi['keterangan'] == 3) : ?>
             <tr>
               <th>Absen Masuk</th>
               <td>
                 <div class="">
                   <a href="<?= base_url('gambar/absensi/' . $detail_absensi['foto_selfie_masuk']) ?>" target="_blank">
                     <img src="<?php echo base_url() . '/gambar/absensi/' . $detail_absensi['foto_selfie_masuk']; ?>" class="card-img mx-auto d-block" style="width: 136px; height: 140px;">
                   </a>
                 </div>
               </td>
             </tr>

             <tr>
               <th>Absen Lembur</th>
               <td>
                 <div class="">
                   <a href="<?= base_url('gambar/absensi/' . $detail_absensi['foto_selfie_pulang']) ?>" target="_blank">
                     <img src="<?php echo base_url() . '/gambar/absensi/' . $detail_absensi['foto_selfie_pulang']; ?>" class="card-img mx-auto d-block" style="width: 136px; height: 140px;">
                   </a>
                 </div>
               </td>
             </tr>
           <?php endif ?>


           <?php if ($detail_absensi['keterangan'] == 4 || $detail_absensi['keterangan'] == 5) : ?>
             <tr>
               <th>Keterangan</th>
               <td><?php echo $detail_absensi['keterangan_izin'] ?></td>
             </tr>
           <?php endif ?>
         </thead>
       </table>


     </section>