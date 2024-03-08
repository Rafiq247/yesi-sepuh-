<?php


class Pelanggan_model extends CI_model
{
    public function getAllPelanggan($id)
    {
        $sql = "SELECT pelanggan.* from pelanggan where id_pelanggan='$id'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function getAllPelaporan($id)
    {
        $sql = "SELECT pengaduan.*, pelanggan.nama_pelanggan as nampel from pelanggan, pengaduan
        where pelanggan.id_pelanggan=pengaduan.id_pelanggan and pengaduan.id_pelanggan='$id' order by pengaduan.tanggal desc";

        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
