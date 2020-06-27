<?php
class M_data extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  function get_data_by_id($table, $where)
  {
    return $this->db->get_where($table, $where);
  }
  function simpan_data($table, $data)
  {
    $this->db->insert($table, $data);
  }
  function update_data($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
  }
  function hapus_data($table, $where)
  {
    $this->db->delete($table, $where);
  }
  function cek_login($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  function join_barang()
  {
    return $this->db->query('SELECT a.id_barang, a.nama_barang, a.kategori_barang, a.harga_satuan, b.id_kategori, b.nama_kategori 
      FROM tbl_master_barang AS a
      LEFT JOIN tbl_master_kategori AS b ON a.kategori_barang = b.id_kategori');
  }

  function join_trans()
  {
    return $this->db->query('SELECT a.id_trans, a.nama_pelanggan, a.barang, a.qty, a.tgl_beli, b.id_barang, b.nama_barang, b.harga_satuan 
    FROM tbl_transaksi AS a
    LEFT JOIN tbl_master_barang AS b ON a.barang = b.id_barang');
  }

  function cari($id)
  {
    $query = $this->db->get_where('tbl_master_barang', array('nama_barang' => $id));
    return $query;
  }
}
