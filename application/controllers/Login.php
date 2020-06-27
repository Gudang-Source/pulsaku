<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $data = [
            'title' => 'Login Page',
            'conten' => 'conten/login'
        ];
        $this->load->view('template/conten', $data);
    }

    public function login_form()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        // petugas
        $where1 = array(
            'username' => $username,
            'password' => $password,
            'level' => 1
        );
        $cek1 = $this->M_data->get_data_by_id("tbl_user", $where1);
        //operator
        $where2 = array(
            'username' => $username,
            'password' => $password,
            'level' => 2
        );
        $cek2 = $this->M_data->get_data_by_id("tbl_user", $where2);

        if ($cek1->num_rows() > 0) {
            foreach ($cek1->result() as $row) {
                $id = $row->id_user;
                $nama = $row->nama_user;
            }
            $data_session = array(
                'status'  => true,
                'level'   => 1,
                'id'      => $id,
                'nama'    => $nama

            );
            $this->session->set_userdata($data_session);
            redirect(base_url("Home"));
        } elseif ($cek2->num_rows() > 0) {
            foreach ($cek1->result() as $row) {
                $id = $row->id_user;
                $nama = $row->nama_user;
            }
            $data_session = array(
                'status'  => true,
                'level'   => 2,
                'id'      => $id,
                'nama'    => $nama

            );
            $this->session->set_userdata($data_session);
            redirect(base_url("Kasir"));
            /*echo "ini user untuk notaris bro";*/
        } else {
            redirect(base_url('Login'));
        }
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
