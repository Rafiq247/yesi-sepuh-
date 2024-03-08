 <!--Content right-->

 <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
    ?>

 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
     <?php if ($this->session->flashdata('flash')) : ?>
         <div class="alert alert-info alert-dismissible fade show" role="alert">
             <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
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
                         <th>EMAIL</th>
                         <th>STATUS</th>
                         <th>KETERANGAN</th>
                         <th>RESET PASSWORD</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1; ?>
                     <?php
                        foreach ($akun as $b) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $b['name']; ?></td>
                             <td><?= $b['email']; ?></td>
                             <td>
                                 <?php if ($b['is_active'] == 1) : ?>
                                     aktif
                                 <?php else : ?>
                                     tidak aktif
                                 <?php endif ?>
                             </td>
                             <td>
                                 <?php if ($b['role_id'] == 1) : ?>
                                     Super Admin
                                 <?php else : ?>
                                     Pegawai
                                 <?php endif ?>
                             </td>
                             <td>
                                 <a href="<?= base_url('admin/reset-password') ?>/<?= $b['id']; ?>" onclick="return confirm('Yakin Ingin Mereset Password?');" class="ml-1 mr-1">
                                     <button type="button" class="btn btn-primary">
                                         <i class="fa fa-repeat"> Reset Password</i>
                                     </button>
                                 </a>
                             </td>
                         </tr>
                     <?php endforeach ?>
                 </tbody>

             </table>
         </div>