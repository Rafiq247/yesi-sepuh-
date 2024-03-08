 <!--Content right-->

 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script type="text/javascript" src="jamServer.js"></script>
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">

   <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
     <div class="row border-bottom mb-4">
       <div class="col-sm-8 pt-2">
         <h6 class="mb-4 bc-header"><?= $title ?></h6>
       </div>
     </div>

     <div class="mt-1 mb-5 button-container">
       <div class="card shadow-sm">
         <div class="card-header  bg-primary">
           <h6 class="text-white">Konfirmasi Absen Hari Ini</h6>
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table id="" class="table table-striped table-bordered">
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