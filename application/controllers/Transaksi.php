<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
            redirect(base_url("login"));
        }
        //  $this->load->library('Pdf');
    }
    public function index()
    {
        $data = [
            'name' => $this->session->userdata('nama'),
            'title' => 'Welcome',
            'conten' => 'conten/transaksi',
            'barang' => $this->M_data->get_data('tbl_master_barang'),
            'list_trans' => $this->M_data->join_trans()
        ];
        $this->load->view('template/conten2', $data);
    }

    public function cari()
    {
        $barang = $_GET['nama_barang'];
        $cari = $this->M_data->cari($barang)->result();
        echo json_encode($cari);
    }

    public function tambah_data()
    {
        $date = date('Y-m-d');
        $table = 'tbl_transaksi';
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'barang' => $this->input->post('barang'),
            'qty' => $this->input->post('qty'),
            'tgl_beli' => $date
        );
        $this->M_data->simpan_data($table, $data);
        redirect('transaksi');
    }

    public function edit_data($id)
    {
        $date = date('Y-m-d');
        $table = 'tbl_transaksi';
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'barang' => $this->input->post('barang'),
            'qty' => $this->input->post('qty'),
            'tgl_beli' => $date
        );
        $where = array('id_trans' => $id);
        $this->M_data->update_data($table, $data, $where);
        redirect('transaksi');
    }

    public function hapus_data($id)
    {
        $table = 'tbl_transaksi';
        $where = array('id_trans' => $id);
        $this->M_data->hapus_data($table, $where);
        redirect('transaksi');
    }
}
