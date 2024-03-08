 <!--Content right-->

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
             <div class="col-sm-4 text-right pb-3">
                 <button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
             </div>
         </div>

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>NAMA</th>
                         <th>TANGGAL LEMBUR</th>
                         <th>WAKTU LEMBUR</th>
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1; ?>
                     <?php
                        foreach ($lemburbydate as $b) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $b['nama_pegawai']; ?></td>
                             <td><?= $b['date']; ?></td>
                             <td><?= date($b['waktu_lembur']); ?></td>
                             <td>
                                 <a class="btn btn-theme ml-1" href="" data-toggle="modal" data-target=".bd-example-modal<?= $b['id_lembur']; ?>">Edit</a>
                                 <a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-lembur') ?>/<?= $b['id_lembur']; ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
                             </td>
                         </tr>
                     <?php endforeach ?>
                 </tbody>

             </table>
         </div>
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

             <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                     <div class="modal-header text-center">
                         <h5 class="modal-title text-secondary"><strong> Tambah Jabatan</strong></h5>
                         <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body text-justify">
                         <form class="form-horizontal" action="<?php echo base_url() . 'admin/simpan-lembur' ?>" method="post" enctype="multipart/form-data">

                             <div class="modal-body">
                                 <div class="form-group">
                                     <label class="col-sm-12">Nama Pegawai</label>
                                     <div class="col-sm-12">
                                         <select class="form-control" id="id_pegawai" name="id_pegawai">
                                             <option value="">-pilih-</option>
                                             <?php foreach ($pegawai as $j) : ?>
                                                 <option value="<?= $j['id_pegawai'] ?>"> <?= $j['nama_pegawai']; ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group">

                                     <label class="col-sm-12">Tanggal Lembur</label>
                                     <div class="col-sm-12">
                                         <input type="date" name="date" class="form-control " required>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-sm-12">Waktu</label>
                                     <div class="col-sm-12">
                                         <input type="time" name="time" class="form-control" required>
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


         <?php foreach ($lemburbydate as $j) :
                $id_lembur = $j['id_lembur'];
                $id_pegawai = $j['idpeg'];
                $nama_pegawai = $j['nama_pegawai'];
                $date = $j['date'];
                $waktu_lembur = $j['waktu_lembur'];

            ?>
             <div class="modal fade bd-example-modal<?php echo $id_lembur; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div class="modal-header text-center">
                             <h5 class="modal-title text-secondary"><strong> Edit Data Lembur Pegawai</strong></h5>
                             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                         </div>
                         <div class="modal-body text-justify">
                             <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-lembur' ?>" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="id_lembur" value="<?php echo $id_lembur; ?>" />
                                 <div class="modal-body">
                                     <div class="form-group">
                                         <label class="col-sm-12">Nama Pegawai</label>
                                         <div class="col-sm-12">
                                             <select class="form-control" id="id_pegawai" name="id_pegawai">
                                                 <option value="">-pilih-</option>
                                                 <?php foreach ($pegawai as $j) : ?>
                                                     <?php if ($j['id_pegawai'] == $id_pegawai) : ?>
                                                         <option value="<?= $j['id_pegawai'] ?>" selected> <?= $j['nama_pegawai']; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= $j['id_pegawai'] ?>"> <?= $j['nama_pegawai']; ?></option>
                                                     <?php endif ?>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-12">Tanggal Lembur</label>
                                         <div class="col-sm-12">
                                             <input type="date" name="date" class="form-control " value="<?= $date ?>" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-12">Waktu</label>
                                         <div class="col-sm-12">
                                             <input type="time" name="time" class="form-control" value="<?= $waktu_lembur ?>" required>
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
         <?php endforeach; ?>