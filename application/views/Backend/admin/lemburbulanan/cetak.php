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

<body <?php if ($this->uri->segment(2) === 'cetak-absen-lembur') : ?> onload="window.print()" <?php else : endif; ?>>
    <center>

        <center>
            <br>
            <font size="4"><b>REKAP ABSEN PEGAWAI</b></font><br><br>
        </center>
        <hr>


        <!-- isi -->
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>

                    <th>NAMA</th>
                    <th>MASUK</th>
                    <th>LEMBUR</th>
                    <th>IZIN</th>
                    <th>SAKIT</th>
                    <th>TOTAL MASUK</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $total = 0; ?>
                <?php
                foreach ($absen as $b) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b['nama_pegawai']; ?></td>
                        <td><?= $b['masuk']; ?> hari</td>
                        <td><?= $b['jumlem']; ?> hari</td>
                        <td><?= $b['izin']; ?> hari</td>
                        <td><?= $b['sakit']; ?> hari</td>
                        <td><?= $b['masuk'] + $b['jumlem']; ?> hari</td>
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