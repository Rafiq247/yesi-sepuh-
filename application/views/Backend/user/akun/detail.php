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
        <div class="content-wrapper">
            <section class="content">
                <table class="table table-bordered table-hover table-striped table-sm mb-0">
                    <thead>
                        <tr>
                            <th width="">Id Pegawai</th>
                            <td><?= $detail_pegawai['id_pegawai'] ?></td>
                            <td rowspan="5"><?= $detail_pegawai['foto'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $detail_pegawai['nama_pegawai'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                <?php if ($detail_pegawai['jekel'] == 'P') : ?>
                                    Perempuan
                                <?php else : ?>
                                    Laki-Laki
                                <?php endif ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Pendidikan</th>
                            <td><?= $detail_pegawai['pendidikan'] ?></td>
                        </tr>
                        <tr>
                            <th>Status Kepegawaian</th>
                            <td>
                                <?php if ($detail_pegawai['status_kepegawaian'] == 1) : ?>
                                    <span class="badge bg-primary">Aktif</span>
                                <?php else : ?>
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td><?= $detail_pegawai['agama'] ?></td>
                            <td rowspan="5"><?= $detail_pegawai['ktp'] ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?= $detail_pegawai['namjab'] ?></td>

                        </tr>
                        <tr>
                            <th>No_hp</th>
                            <td><?= $detail_pegawai['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $detail_pegawai['alamat'] ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Masuk</th>
                            <td><?= $detail_pegawai['tanggal_masuk'] ?></td>
                        </tr>

                    </thead>
                </table>


            </section>
        </div>