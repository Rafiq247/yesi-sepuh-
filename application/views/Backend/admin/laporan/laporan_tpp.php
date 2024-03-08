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
         <form action="laporan-tpp-bulanan" method="post">
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
                 <th>#</th>
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
               <?php $no = 1; ?>
               <?php
                foreach ($gaji as $b) : ?>
                 <tr>
                   <td><?= $no++ ?></td>
                   <td><?= $b['nama_pegawai']; ?></td>
                   <td><?= $b['namjab']; ?></td>
                   <td><?= $b['gaji_pokok']; ?></td>
                   <td><?= $b['gaji_lembur']; ?></td>
                   <td><?= $b['bonus']; ?></td>
                   <td><?= $b['keterangan']; ?></td>
                   <td><?= $b['gaji_bersih']; ?></td>
                   <td width="20px">
                     <div class="row">
                       <a href="<?= base_url('admin/detail-laporan-tpp') ?>/<?= $b['id_pegawai']; ?>/<?= $blnselected; ?>/<?= $thnselected; ?>" class="ml-3 mb-0">
                         <button type="button" class="btn btn-theme">
                           <i class="fa fa-eye"></i>
                         </button>
                       </a>
                       <hr>
                       <a target="_blank" href="<?= base_url(); ?>admin/cetak-payrol-pegawai/<?= $b['id_pegawai']; ?>/<?php echo $blnnya  ?>/<?php echo $thn  ?>" class="ml-0">
                         <button type="button" class="btn btn-danger">
                           <i class="fa fa-print"></i>
                         </button>
                       </a>
                     </div>
                   </td>

                 </tr>
               <?php endforeach ?>
             </tbody>

           </table>
         </div>
       </div>
     </div>
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog modal-lg">
         <div class="modal-content">
           <div class="modal-header text-center">
             <h5 class="modal-title text-secondary"><strong>GAJI PEGAWAI</strong></h5>
             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body text-justify ">

             <form class="form-horizontal" action="<?php echo base_url() . 'admin/simpan-gaji' ?>" method="post">
               <input type="text" name="bulanpilih" value="<?= $blnselected ?>">
               <input type="text" name="tahunpilih" value="<?= $thnselected ?>">
               <div class="modal-body">
                 <div class="form-group col-sm-12">
                   <div class="flash"></div>
                 </div>
                 <div class="form-group">
                   <label class="col-sm-12">Nama Pegawai</label>
                   <div class="col-sm-12">
                     <select class="form-control" id="id_pegawai_c" name="id_pegawai">
                       <option value="">-pilih-</option>
                       <?php foreach ($pegawai as $j) : ?>
                         <option value="<?= $j['id_pegawai'] ?>"> <?= $j['nama_pegawai']; ?></option>
                       <?php endforeach; ?>
                     </select>
                   </div>
                 </div>

                 <div class="row col-lg-12">
                   <div class="form-group col-lg-5">
                     <label class="">Tahun</label>
                     <div class="">
                       <select name="th1" id="thn_c" class="form-control">
                         <option value="">- PILIH TAHUN -</option>
                         <?php
                          foreach ($list_th as $t) { ?>
                           <option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
                         <?php
                          }
                          ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group col-lg-5">
                     <label class="">Bulan</label>
                     <div class="">
                       <select name="bln1" id="bln_c" class="form-control ">
                         <option value="">- PILIH BULAN -</option>
                         <?php
                          foreach ($list_bln as $t) { ?>
                           <option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
                         <?php
                          }
                          ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group col-lg-2">
                     <label class="">_</label>
                     <div class="">
                       <button type="button" onclick="cari()" class="btn btn-success">Akumulasi</button>
                     </div>
                   </div>
                 </div>
                 <div class="form-group col-lg-12" name="lain_nya" id="lain_nya" hidden>
                   <div class="row col-lg-12">
                     <div class="form-group col-lg-6">
                       <label class="">Gaji Pokok</label>
                       <div class="">
                         <input type="text" name="gapok1" id="gapok1" class="form-control" readonly required>
                         <input type="hidden" name="gapok" id="gapok" class="form-control" readonly required>

                       </div>
                     </div>
                     <div class="form-group col-lg-6">
                       <label class="">Lembur</label>
                       <div class="">
                         <input type="text" name="lembur1" id="lembur1" class="form-control " value="" readonly required>
                         <input type="hidden" name="lembur" id="lembur" class="form-control " value="" readonly required>
                       </div>
                     </div>
                   </div>
                   <div class="row col-lg-12">
                     <div class="form-group col-lg-6">
                       <label class="">Bonus</label>
                       <div class="">
                         <input type="text" name="bonus" class="form-control " value="">
                       </div>
                     </div>
                     <div class="form-group col-lg-6">
                       <label class="">Keterangan</label>
                       <div class="">
                         <input type="text" name="keterangan" class="form-control " value="">
                       </div>
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


     <?php foreach ($gaji as $j) :
        $id_payrol = $j['id_payrol'];
        $gaber = $j['gaji_bersih'];
        $id_pegawai = $j['id_pegawai'];
        $id_jabatan = $j['id_jabatan'];
        $nama_pegawai = $j['nama_pegawai'];
        $tanggal = $j['tanggal'];
        $gaji_pokok = $j['gaji_pokok'];
        $gaji_lembur = $j['gaji_lembur'];
        $bonus = $j['bonus'];
        $keterangan = $j['keterangan'];

      ?>
       <div class="modal fade bd-example-modal<?php echo $id_payrol; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header text-center">
               <h5 class="modal-title text-secondary"><strong> Edit Data Lembur Pegawai</strong></h5>
               <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body text-justify ">
               <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-gaji' ?>" method="post">
                 <input type="text" name="bulanpilih" value="<?= $blnselected ?>">
                 <input type="text" name="tahunpilih" value="<?= $thnselected ?>">
                 <div class="modal-body">
                   <div class="row col-lg-12">
                     <div class="form-group col-lg-6">
                       <label class="">Bonus</label>
                       <div class="">
                         <input type="hidden" name="id_payrol" id="bonus" class="form-control" value="<?= $id_payrol ?>" required>
                         <input type="hidden" name="gaber" id="gaber" class="form-control" value="<?= $gaber ?>" required>
                         <input type="text" name="bonus" id="bonus" class="form-control" value="<?= $bonus ?>" required>
                       </div>
                     </div>
                     <div class="form-group col-lg-6">
                       <label class="">Keterangan</label>
                       <div class="">
                         <input type="text" name="keterangan" id="keterangan" class="form-control " value="<?= $keterangan ?>" required>
                       </div>
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
 <?php endforeach; ?>
 <!-- tutup -->

 <script>
   const rupiah = (number) => {
     return new Intl.NumberFormat("id-ID", {
       style: "currency",
       currency: "IDR"
     }).format(number);
   }

   function kosong() {

     $('#gapok').val('')
     $('#lembur').val('')
     // $('#isitable').load('datatable.php')

   }

   function cari() {
     console.log($('#gapok').val());




     var id_pegawai = $('#id_pegawai_c').val();
     var thn = $('#thn_c').val();
     var bln = $('#bln_c').val();
     console.log(bln);
     console.log(thn);
     console.log(id_pegawai);

     //  proses ajax

     $.ajax({
       url: '<?= base_url() ?>admin/akumulasi-gaji',
       type: 'POST',
       dataType: 'JSON',
       data: {
         'id_pegawai': id_pegawai,
         'tahun_cari': thn,
         'bulan_cari': bln
       },

       success: function(data) {
         console.log(data);
         <?php $this->load->model('Admin_model'); ?>
         if (data.flash == "Data Ditemukan") {
           console.log('berhasil');
           var flash = ``;
           flash = flash + `
               <div class="alert alert-info alert-dismissible fade show" role="alert">
               <p><strong>${data.flash} <i class="fa fa-info"></i>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </strong></p>
             </div>`;
           //  $('#flash').val(data.flash);
           $('.flash').html(flash);
           $('#lain_nya').prop('hidden', false);;
           $('#lembur').val(data.gaji_lembur);
           $('#gapok').val(data.gaji_msk);
           $('#lembur1').val(rupiah(data.gaji_lembur));
           $('#gapok1').val(rupiah(data.gaji_msk));

         } else {
           $('#lain_nya').prop('hidden', 'true');;
           kosong();
           var flash = ``;
           flash = flash + `
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <p><strong>${data.flash} <i class="fa fa-info"></i>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </strong></p>
             </div>`;
           //  $('#flash').val(data.flash);
           $('.flash').html(flash);
         }


       }
     });
   }
 </script>