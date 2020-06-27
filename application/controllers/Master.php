<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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
            'title' => 'Master Kategori',
            'conten' => 'conten/master_kategori',
            'kategori' => $this->M_data->get_data('tbl_master_kategori')
        ];
        $this->load->view('template/conten2', $data);
    }

    function tambah_kategori()
    {
        $table = 'tbl_master_kategori';
        $data = array(
            'nama_kategori'     => $this->input->post('kategori')
        );
        $this->M_data->simpan_data($table, $data);
        //$this->session->set_flashdata('user','Ditambah');
        redirect('master');
    }

    function edit_kategori($id)
    {
        $table = 'tbl_master_kategori';
        $data = array(
            'nama_kategori' => $this->input->post('kategori')
        );
        $where = array(
            'id_kategori' => $id
        );
        $this->M_data->update_data($table, $data, $where);
        redirect('master');
    }

    function hapus_kategori($id)
    {
        $table = 'tbl_master_kategori';
        $where = array('id_kategori' => $id);
        $this->M_data->hapus_data($table, $where);
        redirect('master');
    }

    function master_barang()
    {
        $data = [
            'name' => $this->session->userdata('nama'),
            'title' => 'Master Barang',
            'conten' => 'conten/master_barang',
            'kategori' => $this->M_data->get_data('tbl_master_kategori'),
            'barang' => $this->M_data->join_barang()
        ];
        $this->load->view('template/conten2', $data);
    }

    function tambah_barang()
    {
        $table = 'tbl_master_barang';
        $data = array(
            'nama_barang'         => $this->input->post('nama_barang'),
            'kategori_barang'     => $this->input->post('kategori'),
            'harga_satuan'        => $this->input->post('harga_barang')
        );
        $this->M_data->simpan_data($table, $data);
        //$this->session->set_flashdata('user','Ditambah');
        redirect('master/master_barang');
    }

    function update_barang($id)
    {
        $table = 'tbl_master_barang';
        $data = array(
            'nama_barang'         => $this->input->post('nama_barang'),
            'kategori_barang'     => $this->input->post('kategori'),
            'harga_satuan'        => $this->input->post('harga_barang')
        );
        $where = array('id_barang' => $id);
        $this->M_data->update_data($table, $data, $where);
        redirect('master/master_barang');
    }

    function hapus_barang($id)
    {
        $table = 'tbl_master_barang';
        $where = array('id_barang' => $id);
        $this->M_data->hapus_data($table, $where);
        redirect('master/master_barang');
    }
}
