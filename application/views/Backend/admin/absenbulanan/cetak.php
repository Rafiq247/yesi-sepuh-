<!DOCTYPE html>
<html>

<?php
// $this->load->view('backend/template/header');


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

<head>
  <title>REKAP ABSENSI PEGAWAI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body <?php if ($this->uri->segment(2) === 'cetak-absen-bulanan') : ?> onload="window.print()" <?php else : endif; ?>>
  <center>

    <center>
      <br>
      <font size="4"><b>REKAP ABSEN PEGAWAI</b></font><br><br>
    </center>
    <hr>


    <table width=700>

      <tr>
        <td width=20 colspan=2><b>NAMA MAHASISWA</b></td>
        <td colspan=9><b>: <?= strtoupper($detail_pegawai['nama_pegawai']) ?></td>
      </tr>
      <tr>
        <td width=20 colspan=2><b>JABATAN</b></td>
        <td colspan=9><b>: <?= strtoupper($detail_pegawai['namjab']) ?></b></td>
      </tr>

      <tr>
        <td width=20 colspan=2><b>PERIODE ABSEN</b>
        <td colspan=9>
          <b>
            <?php echo strtoupper(nmbulan($blnselected)); ?>-<?php echo strtoupper($thnselected); ?>
          </b>
        </td>
      </tr>
    </table>
    <!-- isi -->
    <table id="" class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>TANGGAL</th>
          <th>WAKTU</th>
          <th>JENIS ABSEN</th>

          <th>LEMBUR</th>
          <th>KETERANGAN IZIN</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        $total = 0; ?>
        <?php
        foreach ($absen as $b) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $b['tanggal']; ?></td>
            <td><?= $b['waktu']; ?></td>
            <td class="text-center">
              <?php if ($b['keterangan'] == 0) : ?>
                <span class="">Alfa</span>
              <?php elseif ($b['keterangan'] == 1) : ?>
                <span class="">Masuk</span>
              <?php elseif ($b['keterangan'] == 2) : ?>
                <span class="">Pulang</span>
              <?php elseif ($b['keterangan'] == 3) : ?>
                <span class="">Lembur</span>
              <?php elseif ($b['keterangan'] == 4) : ?>
                <span class="">Izin Sakit</span>
              <?php elseif ($b['keterangan'] == 5) : ?>
                <span class="">Izin Tidak Masuk</span>
              <?php endif ?>

            </td>

            <td> <?php if ($b['id_lembur'] == null) : ?>
                Tidak
              <?php else : ?>
                Iya
              <?php endif ?>
            </td>
            <td>
              <?php if ($b['keterangan'] == 4 || $b['keterangan'] == 5) : ?>
                <?= $b['keterangan_izin']; ?>
              <?php else : ?>
                masuk
              <?php endif ?>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <!-- tutup isi -->


    <br>
    <table width="625">
      <tr>
        <td width="430"><br><br><br><br></td>
        <td class="text" align="center"><br>
          <br><br><b>Penanggung Jawab<br><br><br><br><br> HRD</b>
        </td>
      </tr>
    </table>
  </center>
</body>

</html>