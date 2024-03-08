 <!--Content right-->

 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
   <?php if ($this->session->flashdata('flash')) : ?>
     <div class="alert alert-info alert-dismissible fade show" role="alert">
       <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
       <?= $this->session->unset_userdata('flash');  ?>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
   <?php endif ?>
   <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
     <div class="row border-bottom mb-4">
       <div class="col-sm-8 pt-2">
         <h6 class="mb-4 bc-header"><?= $title ?></h6>
       </div>

     </div>
     <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered">
         <thead>
           <tr>
             <th>#</th>
             <th>NAMA</th>
             <th>TANGGAL</th>
             <th>WAKTU</th>
             <th>BUKTI MASUK/SURAT SAKIT</th>
             <th>BUKTI PULANG</th>
             <th>KETERANGAN</th>
             <th>LEMBUR</th>
             <th>AKSI</th>
           </tr>
         </thead>
         <tbody>
           <?php $no = 1; ?>
           <?php
            foreach ($konfirmasi as $b) : ?>
             <tr>
               <td><?= $no++ ?></td>
               <td><?= $b['nama_pegawai']; ?></td>
               <td><?= $b['tanggal']; ?></td>
               <td><?= $b['waktu']; ?></td>
               <td>
                 <?php if ($b['foto_selfie_masuk'] == null) : ?>
                   <span class="badge badge-success">Izin</span>
                 <?php else : ?>
                   <?= $b['foto_selfie_masuk']; ?>
                 <?php endif ?>
               </td>
               <td>
                 <?php if ($b['foto_selfie_pulang'] == null) : ?>
                   <?php if ($b['keterangan'] == 4 || $b['keterangan'] == 5) : ?>
                     <span class="badge badge-success">Izin</span>
                   <?php else : ?>
                     Belum diupload
                   <?php endif ?>
                 <?php else : ?>
                   <?= $b['foto_selfie_pulang']; ?>
                 <?php endif ?>
               </td>

               <td class="text-center">
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

               <td class="text-center">
                 <?php if ($b['id_lembur'] == null) : ?>
                   <span class="badge badge-danger">Tidak</span>
                 <?php else : ?>
                   <span class="badge badge-success">Iya</span>
                 <?php endif ?>
               </td>


               <td>
                 <?php if ($b['keterangan'] == 1 && $b['status'] == 0) : ?>
                   <a class="btn btn-primary" href="<?= base_url('admin/konfirmasi-absen') ?>/<?= $b['id_presents']; ?>" onclick="return confirm('Yakin Ingin Konfirmasi?');">Konfirmasi</a>
                 <?php elseif ($b['keterangan'] == 1 && $b['status'] == 1) : ?>
                   <span class="badge badge-primary">Terkonfirmasi</span>
                 <?php elseif ($b['keterangan'] == 2 && $b['status'] == 1) : ?>
                   <a class="btn btn-primary" href="<?= base_url('admin/konfirmasi-absen-pulang') ?>/<?= $b['id_presents']; ?>" onclick="return confirm('Yakin Ingin Konfirmasi?');">Konfirmasi</a>
                 <?php elseif ($b['keterangan'] == 2 && $b['status'] == 2) : ?>
                   <span class="badge badge-primary">Terkonfirmasi</span>
                 <?php elseif ($b['keterangan'] == 3 && $b['status'] != 3) : ?>
                   <a class="btn btn-primary" href="<?= base_url('admin/konfirmasi-absen-lembur') ?>/<?= $b['id_presents']; ?>/<?= $b['id_pegawai']; ?>" onclick="return confirm('Yakin Ingin Konfirmasi?');">Konfirmasi</a>
                 <?php elseif ($b['keterangan'] == 3 && $b['status'] == 3) : ?>
                   <span class="badge badge-primary">Terkonfirmasi</span>
                 <?php elseif ($b['keterangan'] == 4 && $b['status'] <= 3) : ?>
                   <a class="btn btn-primary" href="<?= base_url('admin/konfirmasi-absen-izinsakit') ?>/<?= $b['id_presents']; ?>" onclick="return confirm('Yakin Ingin Konfirmasi?');">Konfirmasi</a>
                 <?php elseif ($b['keterangan'] == 4 && $b['status'] <= 4) : ?>
                   <span class="badge badge-primary">Terkonfirmasi</span>
                 <?php elseif ($b['keterangan'] == 5 && $b['status'] <= 4) : ?>
                   <a class="btn btn-primary" href="<?= base_url('admin/konfirmasi-absen-izin-tidak-masuk') ?>/<?= $b['id_presents']; ?>" onclick="return confirm('Yakin Ingin Konfirmasi?');">Konfirmasi</a>
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