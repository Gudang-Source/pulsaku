<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            'title' => 'User',
            'conten' => 'conten/user',
            'user' => $this->M_data->get_data('tbl_user')
        ];
        $this->load->view('template/conten2', $data);
    }

    public function tambah_user()
    {
        $table = 'tbl_user';
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('username')),
            'keterangan' => $this->input->post('username'),
            'level' => $this->input->post('level')
        );
        $this->M_data->simpan_data($table, $data);
        redirect('user');
    }

    public function ubah_user($id)
    {
        $table = 'tbl_user';
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'keterangan' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $where = array('id_user' => $id);
        $this->M_data->update_data($table, $data, $where);
        redirect('user');
    }

    public function hapus_user($id)
    {
        $table = 'tbl_user';
        $where = array('id_user' => $id);
        $this->m_data->hapus_data($table, $where);
        redirect('user');
    }
}
