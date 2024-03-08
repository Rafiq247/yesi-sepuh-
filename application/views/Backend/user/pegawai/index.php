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
             <div class="col-sm-4 text-right pb-3">
                 <button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
                 <!-- <a target="_blank" class="btn btn-round btn-danger" href="<?= base_url('admin/cetak-jadwal') ?>"><i class="fa fa-plus"></i> Report</a> -->
             </div>



         </div>

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>NAMA PEGAWAI</th>
                         <th>STATUS KEPEGAWAIAN</th>
                         <th>TANGGAL MASUK</th>
                         <th>JABATAN</th>
                         <th>NO.HP</th>
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1; ?>
                     <?php
                        foreach ($pegawai as $b) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $b['nama_pegawai']; ?></td>
                             <td>
                                 <?php if ($b['status_kepegawaian'] == 1) : ?>
                                     aktif
                                 <?php else : ?>
                                     tidak aktif
                                 <?php endif ?>
                             <td><?= $b['tanggal_masuk']; ?></td>
                             <td><?= $b['namjab']; ?></td>
                             <td><?= $b['no_hp']; ?></td>
                             <td width="120px">
                                 <div class="row">
                                     <a href="<?= base_url('admin/detail-pegawai') ?>/<?= $b['id_pegawai']; ?>" class="ml-2">
                                         <button type="button" class="btn btn-theme">
                                             <i class="fa fa-eye"></i>
                                         </button>
                                     </a>
                                     <a class="ml-1" data-toggle="modal" data-target=".bd-example-modal<?= $b['id_pegawai']; ?>">
                                         <button type="button" class="btn btn-primary">
                                             <i class="fa fa-pencil-square-o"></i>
                                         </button>
                                     </a>
                                     <a href="<?= base_url('admin/hapus-pegawai') ?>/<?= $b['id_pegawai']; ?>/<?= $b['id_user']; ?>" onclick="return confirm('Yakin Ingin Menghapus?');" class="ml-1 mr-1">
                                         <button type="button" class="btn btn-danger">
                                             <i class="fa fa-trash"></i>
                                         </button>
                                     </a>

                                 </div>
                             </td>
                         </tr>
                     <?php endforeach ?>
                 </tbody>

             </table>
         </div>

         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
             <?php $koneksi = mysqli_connect('localhost', 'root', '', 'db_kepegawaian');
                $query = mysqli_query($koneksi, "SELECT max(temp) as kodeTerbesar FROM user");
                $data = mysqli_fetch_array($query);
                $id_user = $data['kodeTerbesar'];
                $urutan = (int) ($id_user);
                $urutan++;
                $huruf_pegawai = "P-00";
                $huruf_user = "U-00";
                $temp = $urutan;
                $id_user = $huruf_user . $urutan;
                $id_pegawai = $huruf_pegawai . $urutan; ?>
             <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                     <div class="modal-header text-center">
                         <h5 class="modal-title text-secondary"><strong> Tambah Pegawai</strong></h5>
                         <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body text-justify ">
                         <?php echo form_open_multipart('admin/tambah-pegawai'); ?>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-6">
                                     <input type="hidden" name="temp" class="form-control " value="<?= $temp ?>">
                                     <input type="hidden" name="id_pegawai" class="form-control " value="<?= $id_pegawai ?>">
                                     <input type="hidden" name="id_user" class="form-control " value="<?= $id_user ?>">
                                     <div class="form-group">
                                         <label>Nama</label>
                                         <div>
                                             <input type="text" name="nama_pegawai" class="form-control " required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label>Jenis Kelamin</label>
                                         <div>
                                             <select class="form-control" id="jekel" name="jekel">
                                                 <option value="">-pilih-</option>
                                                 <option value="L">Laki-Laki</option>
                                                 <option value="P">Perempuan</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label>Email</label>
                                         <div>
                                             <input type="text" name="email" class="form-control " required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label>Pendidikan</label>
                                         <div>
                                             <input type="text" name="pendidikan" class="form-control " required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label>Status Kepegawaian</label>
                                         <div>
                                             <select class="form-control" id="status_pegawai" name="status_pegawai" required>
                                                 <option value="">-pilih-</option>
                                                 <option value="1">Aktif</option>
                                                 <option value="0">Tidak Aktif</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="">KTP</label>
                                         <div class="">
                                             <input type="file" name="userfilektp" class="form-control" id="userfilektp" required>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label class="col-sm-12">Agama</label>
                                         <div class="col-sm-12">
                                             <select class="form-control" id="agama" name="agama">
                                                 <option value="">-pilih-</option>
                                                 <option value="Islam">Islam</option>
                                                 <option value="Protestan">Protestan</option>
                                                 <option value="Katolik">Katolik</option>
                                                 <option value="Hindu">Hindu</option>
                                                 <option value="Budha">Budha</option>
                                                 <option value="Khonghucu">Khonghucu</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-12">Jabatan</label>
                                         <div class="col-sm-12">
                                             <select class="form-control" id="jabatan" name="jabatan">
                                                 <option value="">-pilih-</option>
                                                 <?php foreach ($jabatan as $j) : ?>
                                                     <option value="<?= $j['id_jabatan'] ?>"> <?= $j['jabatan']; ?></option>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-12">No.Hp</label>
                                         <div class="col-sm-12">
                                             <input type="text" name="nohp" class="form-control " required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-12">Alamat</label>
                                         <div class="col-sm-12">
                                             <input type="text" name="alamat" class="form-control " required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-12">Tanggal Masuk</label>
                                         <div class="col-sm-12">
                                             <input type="date" name="tgl_msk" class="form-control " required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-12">Foto</label>
                                         <div class="col-sm-12">
                                             <input type="file" name="userfilefoto" class="form-control" id="userfilefoto" required>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <!-- /.card-body -->
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                         </div>
                         </form>
                     </div>

                 </div>
             </div>
         </div>



         <!-- edit modal -->

         <?php foreach ($pegawai as $j) :
                $id_pegawai = $j['id_pegawai'];
                $nama_pegawai = $j['nama_pegawai'];
                $jekel1 = $j['jekel'];
                $id_user1 = $j['id_user'];
                $pendidikan = $j['pendidikan'];
                $status_kepegawaian = $j['status_kepegawaian'];
                $agama1 = $j['agama'];
                // var_dump($agama1);
                // die;
                $idjabatan = $j['jabatan'];
                $no_hp = $j['no_hp'];
                $alamat = $j['alamat'];
                $foto = $j['foto'];
                $ktp = $j['ktp'];
                $tanggal_masuk = $j['tanggal_masuk'];
            ?>
             <div class="modal fade bd-example-modal<?php echo $id_pegawai; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div class="modal-header text-center">
                             <h5 class="modal-title text-secondary"><strong> Edit Bus</strong></h5>
                             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                         </div>
                         <div class="modal-body text-justify">
                             <?php echo form_open_multipart('admin/edit-pegawai'); ?>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <input type="hidden" name="id_pegawai" class="form-control " value="<?= $id_pegawai ?>">
                                         <input type="hidden" name="id_user" class="form-control " value="<?= $id_user1 ?>">
                                         <div class="form-group">
                                             <label>Nama</label>
                                             <div>
                                                 <input type="text" name="nama_pegawai" class="form-control " value="<?= $nama_pegawai ?>">
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label>Jenis Kelamin</label>
                                             <div>
                                                 <select class="form-control" id="jekel" name="jekel">
                                                     <option value="">-pilih-</option>
                                                     <?php foreach ($jekel as $j) : ?>
                                                         <?php if ($j == $jekel1) : ?>
                                                             <?php if ($j == 'L') : ?>
                                                                 <option value="<?= $j ?>" selected>Laki-Laki</option>
                                                             <?php else : ?>
                                                                 <option value="<?= $j ?>" selected>Perempuan</option>
                                                             <?php endif ?>
                                                         <?php else : ?>
                                                             <?php if ($j == 'L') : ?>
                                                                 <option value="<?= $j ?>">Laki-Laki</option>
                                                             <?php else : ?>
                                                                 <option value="<?= $j ?>">Perempuan</option>
                                                             <?php endif ?>
                                                         <?php endif ?>
                                                     <?php endforeach; ?>

                                                 </select>
                                             </div>
                                         </div>

                                         <div class="form-group">
                                             <label>Pendidikan</label>
                                             <div>
                                                 <input type="text" name="pendidikan" class="form-control " value="<?= $pendidikan ?>">
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label>Status Kepegawaian</label>
                                             <div>
                                                 <select class="form-control" id="status_pegawai" name="status_pegawai" required>
                                                     <option value="">-pilih-</option>
                                                     <?php foreach ($stapeg as $jk) : ?>
                                                         <?php if ($jk == $status_kepegawaian) : ?>
                                                             <?php if ($jk == '1') : ?>
                                                                 <option value="1" selected>Aktif</option>
                                                             <?php else : ?>
                                                                 <option value="0" selected>Tidak Aktif</option>
                                                             <?php endif ?>
                                                         <?php else : ?>
                                                             <?php if ($jk == '1') : ?>
                                                                 <option value="1">Aktif</option>
                                                             <?php else : ?>
                                                                 <option value="0">Tidak Aktif</option>
                                                             <?php endif ?>
                                                         <?php endif; ?>
                                                     <?php endforeach; ?>

                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="">KTP</label>
                                             <div class="">
                                                 <input type="file" name="userfilektp" class="form-control" id="userfilektp" value="<?= $ktp ?>">
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="">Foto</label>
                                             <div class="">
                                                 <input type="file" name="userfilefoto" class="form-control" id="userfilefoto" value="<?= $foto ?>">
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label class="col-sm-12">Agama</label>
                                             <div class="col-sm-12">
                                                 <select class="form-control" id="agama" name="agama">
                                                     <option value="">-pilih-</option>
                                                     <?php foreach ($agama as $agm) : ?>
                                                         <?php if ($agm == $agama1) : ?>
                                                             <option value="<?= $agm ?>" selected><?= $agm ?></option>
                                                         <?php else : ?>
                                                             <option value="<?= $agm ?>"><?= $agm ?></option>
                                                         <?php endif ?>
                                                     <?php endforeach; ?>

                                                 </select>
                                             </div>
                                         </div>
                                         <?php $jabatan = $this->Admin_model->getAlljabatan(); ?>
                                         <div class="form-group">
                                             <label class="col-sm-12">Jabatan</label>
                                             <div class="col-sm-12">
                                                 <select class="form-control" id="jabatan" name="jabatan">
                                                     <option value="">-pilih-</option>
                                                     <?php foreach ($jabatan as $j) : ?>
                                                         <?php if ($j['id_jabatan'] == $idjabatan) : ?>
                                                             <option value="<?= $j['id_jabatan'] ?>" selected> <?= $j['jabatan']; ?></option>
                                                         <?php else : ?>
                                                             <option value="<?= $j['id_jabatan'] ?>"> <?= $j['jabatan']; ?></option>
                                                         <?php endif ?>
                                                     <?php endforeach; ?>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="col-sm-12">No.Hp</label>
                                             <div class="col-sm-12">
                                                 <input type="text" name="nohp" class="form-control " value="<?= $no_hp ?>" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="col-sm-12">Alamat</label>
                                             <div class="col-sm-12">
                                                 <input type="text" name="alamat" class="form-control " value="<?= $alamat ?>" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="col-sm-12">Tanggal Masuk</label>
                                             <div class="col-sm-12">
                                                 <input type="date" name="tgl_msk" class="form-control " value="<?= $tanggal_masuk ?>" required>
                                             </div>
                                         </div>

                                     </div>
                                 </div>

                             </div>
                             <!-- /.card-body -->
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